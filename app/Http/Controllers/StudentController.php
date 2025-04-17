<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentdata;
use App\Models\User;
use App\Models\Mark;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Services\DeeplyService;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{
    public function profile()
    {
        $user = User::where('id', Auth::id())->latest()->first();
    
        return view('profile', [
            'user' => $user
        ]);
    }


    public function showOtpForm()
    {
        return view('verify-OTP');
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        if ($request->otp == Session::get('otp')) {
            $userData = Session::get('pending_user');

            // Create and save user
            $user = new User();
            $user->firstname = $userData['firstname'];
            $user->lastname = $userData['lastname'];
            $user->email = $userData['email'];
            $user->password = Hash::make($userData['password']);
            $user->save();

            // Clear session data
            Session::forget('otp');
            Session::forget('pending_user');

            return redirect()->route('login')->with('success', 'Registration complete! You can now login.');
        }

        return back()->with('error', 'Invalid OTP. Please try again.');
    }


    public function showLinkRequestForm()
    {
        return view('email');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email'], [
            'email.required' => 'Email ID is required.',
            'email.email' => 'Please Enter A Valid Email ID.'
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


    public function showResetForm(Request $request)
    {
        return view('reset')->with(
            ['token' => $request->token, 'email' => $request->email]
        );
    }


    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }


    public function kanban()
    {
        // Group students by their status in the specified order
        $statuses = [
            'Applied',
            'Test Given',
            'Test Passed',
            'Documents Verification',
            'Rejected',
            'Fees Paid',
            'Admitted'
        ];

        $studentsByStatus = [];

        foreach ($statuses as $status) {
            $studentsByStatus[$status] = StudentData::where('status', $status)
                ->orderBy('rollno')
                ->get();
        }

        return view('student-kanban', compact('studentsByStatus', 'statuses'));
    }



    public function updateStatus(Request $request, $rollno)
    {
        $student = StudentData::where('rollno', $rollno)->firstOrFail();
        $student->status = $request->status;
        $student->save();

        return response()->json(['success' => true]);
    }




    public function marksentryform(Request $request)
    {

        $request->validate([

            'studentrollno' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
            'mathsmarks' => 'required | integer | gt:-1 | lt:101',
            'sciencemarks' => 'required | integer | gt:-1 | lt:101',
            'ssmarks' => 'required | integer | gt:-1 | lt:101',
            'englishmarks' => 'required | integer | gt:-1 | lt:101',
            'sanskritmarks' => 'required | integer | gt:-1 | lt:101',
            'hindimarks' => 'required | integer | gt:-1 | lt:101',
            'gujaratimarks' => 'required | integer | gt:-1 | lt:101',
            'computermarks' => 'required | integer | gt:-1 | lt:101'

        ], [

            'studentrollno.required' => 'Roll number is required.',
            'studentrollno.regex' => 'Roll number must contain both letters and numbers.',

            'mathsmarks.required' => 'Marks Of Maths is required.',
            'mathsmarks.integer' => 'Marks Of Maths must be a number.',
            'mathsmarks.gt' => 'Marks Of Maths must be greater than or equal to 0.',
            'mathsmarks.lt' => 'Marks Of Maths must be less than 101.',

            'sciencemarks.required' => 'Marks Of Science is required.',
            'sciencemarks.integer' => 'Marks Of Science must be a number.',
            'sciencemarks.gt' => 'Marks Of Science must be greater than or equal to 0.',
            'sciencemarks.lt' => 'Marks Of Science must be less than 101.',

            'ssmarks.required' => 'Marks Of Social Science is required.',
            'ssmarks.integer' => 'Marks Of Social Science must be a number.',
            'ssmarks.gt' => 'Marks Of Social Science must be greater than or equal to 0.',
            'ssmarks.lt' => 'Marks Of Social Science must be less than 101.',

            'englishmarks.required' => 'Marks Of English  is required.',
            'englishmarks.integer' => 'Marks Of English  must be a number.',
            'englishmarks.gt' => 'Marks Of English must be greater than or equal to 0.',
            'englishmarks.lt' => 'Marks Of English must be less than 101.',

            'sanskritmarks.required' => 'Marks Of Sanskrit is required.',
            'sanskritmarks.integer' => 'Marks Of Sanskrit must be a number.',
            'sanskritmarks.gt' => 'Marks Of Sanskrit must be greater than or equal to 0.',
            'sanskritmarks.lt' => 'Marks Of Sanskrit must be less than 101.',

            'hindimarks.required' => 'Marks Of Hindi is required.',
            'hindimarks.integer' => 'Marks Of Hindi must be a number.',
            'hindimarks.gt' => 'Marks Of Hindi must be greater than or equal to 0.',
            'hindimarks.lt' => 'Marks Of Hindi must be less than 101.',

            'gujaratimarks.required' => 'Marks Of Gujarati is required.',
            'gujaratimarks.integer' => 'Marks Of Gujarati must be a number.',
            'gujaratimarks.gt' => 'Marks Of Gujarati must be greater than or equal to 0.',
            'gujaratimarks.lt' => 'Marks Of Gujarati must be less than 101.',

            'computermarks.required' => 'Marks Of Computer is required.',
            'computermarks.integer' => 'Marks Of Computer must be a number.',
            'computermarks.gt' => 'Marks Of Computer must be greater than or equal to 0.',
            'computermarks.lt' => 'Marks Of Computer must be less than 101.'
        ]);


        $studentmarks = new Mark();
        $studentmarks->userid = Auth::id();
        $studentmarks->rollno = $request->studentrollno;
        $studentmarks->maths = $request->mathsmarks;
        $studentmarks->science = $request->sciencemarks;
        $studentmarks->ss = $request->ssmarks;
        $studentmarks->english = $request->englishmarks;
        $studentmarks->sanskrit = $request->sanskritmarks;
        $studentmarks->hindi = $request->hindimarks;
        $studentmarks->gujarati = $request->gujaratimarks;
        $studentmarks->computer = $request->computermarks;

        $studentmarks->save();
        return back()->withSuccess('Student Marks Inserted Successfully!!!');

    }


    function dashboard()
    {
        $data = Studentdata::select('rollno', 'created_at')->get();

        $months = [];
        $monthCount = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('M'); // Get month abbreviation (e.g., Jan, Feb)
            $months[] = $monthName;
            $monthCount[] = $data->filter(function ($item) use ($i) {
                return Carbon::parse($item->created_at)->month == $i; // Filter data for the current month
            })->count();
        }


        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y')) // current year
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize an array with all months set to 0
        $monthsb = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $datab = array_fill(0, 12, 0);

        // Fill the data array with actual counts
        foreach ($users as $user) {
            $datab[$user->month - 1] = $user->count;
        }


        // $datasets = [
        //     [
        //         'label' => 'Users',
        //         'datab' => $datab,
        //         'backgroundColor' => $colors,
        //         'bordercolors'=> $bordercolors
        //     ]
        // ];



        $totalstudentsystem = Studentdata::count();

        $data1 = Studentdata::where('userid', Auth::id())->latest()->get();
        $totalyrstudent = $data1->count();

        $totalusersystem = User::count();


        // return view('dashboard', compact('months', 'monthCount','monthsb','monthCountb'));
        // return view('dashboard', compact('datasets','labels'));


        return view('dashboard', [
            'months' => $months,
            'monthCount' => $monthCount,

            'monthsb' => $monthsb,
            'datab' => $datab,

            'totalstudentsystem' => $totalstudentsystem,
            'totalyrstudent' => $totalyrstudent,
            'totalusersystem' => $totalusersystem

        ]);

    }



    public function logout(Request $request)
    {
        Auth::logout();  // Log the user out
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate CSRF token for security

        $request->session()->flash('success', ' logged out successfully!!! ');
        return redirect('/welcome');
        // Redirect to login page
    }



    function login(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:8',
        ], [
            'email.required' => 'Email ID is required.',
            'email.email' => 'Please Enter a Valid Email ID Syntax.',

            'password.required' => 'Password is required.',
            'password.min' => 'Please Enter Minimum 8 Characters.'

        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            // Email not found
            return back()->withErrors([
                'email' => 'This Email ID is not registered , Please Register First.',
            ]);
        }

        // Attempt to authenticate the user
        if (Auth::attempt($validated)) {
            // Regenerate the session ID for security
            $request->session()->regenerate();

            // Store user details in the session
            session([
                'id' => Auth::id(),
                'name' => Auth::user()->name,
            ]);

            // Redirect to the intended page with a success message
            return redirect()->intended('home')->withSuccess('Logged in Successfully!!!');
        } else {

            // If authentication fails, return with an error message
            return back()->withErrors([
                'password' => 'Entered Password is Wrong , Please Enter Valid Password.'
            ]);
        }
    }
    //     function login(Request $request){

    //     $validated = $request->validate([
//    'email' =>'required | email',
//    'password'=> 'required',

    //     ]);

    //     $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
//         'secret' => config('services.recaptcha.secret_key'),
//         'response' => $request->input('g-recaptcha'),
//     ]);

    //     if (!$response->successful() || !$response->json('success') || $response->json('score') < 0.5) { // Adjust score threshold as needed
//         return back()->with('error', 'Invalid reCAPTCHA. Please try again.');
    // Or handle the error as you see fit
//     }

    //     if (Auth::attempt($validated)) {
//         $request->session()->regenerate();

    // session([
// 'id'=>Auth::id(),
// 'name' => Auth::user()-> name,
// ]);

    //         return redirect()->intended('welcome')->withSuccess('Logged in Successfully!!!');
//     }
//    return back()->withErrors([
//     'email' => 'The provided credentials do not match our records.',
// ]);;
//     }



    function register(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'firstname' => 'required | min:3 | max:20',
            'lastname' => 'required | min:3 | max:20',
            'email' => 'required | email | unique:users,email', // Ensure email is unique
            'password' => 'required | min:8 | confirmed', // Add password length validation
            'password_confirmation' => 'required | min:8'
        ], [
            'firstname.required' => 'First Name is required.',
            'firstname.min' => 'First Name Must Be Atleast 3 Characters.',
            'firstname.max' => 'First Name must not exceed 20 characters.',

            'lastname.required' => 'Last Name is required.',
            'lastname.min' => 'Last Name Must Be Atleast 3 Characters.',
            'lastname.max' => 'Last Name must not exceed 20 characters.',

            'email.required' => 'Email Address is required.',
            'email.email' => 'Please Enter a Valid Email ID.',
            'email.unique' => 'This Email ID Has Already Been Taken.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password Must Be Atleast 8 Characters.',
            'password.confirmed' => 'Password Does Not Match.',

            'password_confirmation.required' => 'Confirm Password is required.',
            'password_confirmation.min' => 'Also, Confirm Password Must Be Atleast 8 Characters.'
        ]);

        // Create a new user
        $otp = rand(100000, 999999);

        // Store user info and OTP in session
        Session::put('otp', $otp);
        Session::put('pending_user', [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password // Store plain password temporarily
        ]);

        // Send OTP Email
        Mail::raw("Hello !! Your OTP for registration is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('OTP for Registration');
        });

        return redirect('/verify-otp')->with('success', 'An OTP has been sent to your email. Please verify to complete registration.');
    }



    function add(Request $request)
    {

        $request->validate([

            'studentfname' => 'required | min:3 | max:20',
            'studentmname' => 'required | min:1 | max:20',
            'studentlname' => 'required | min:3 | max:20',
            'studentaddressline1' => 'required | min:5 | max:50',
            'studentaddressline2' => 'required | min:5 | max:50',
            'studentcity' => 'required | min:3 | max:20',
            'studentpincode' => 'required | digits:6',
            'studentphoneno' => 'required | digits:10',
            'studentemail' => 'required | email',
            'studentstd' => 'required | integer | gt:0 | lt:13',
            'studentdob' => 'required | before:today',
            'studentrollno' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
            'studentimage' => 'required | image|mimes:jpeg,png,jpg,gif|max:2048',
            'studentstatus' => 'required'
        ], [
            'studentfname.required' => 'First Name is required.',
            'studentfname.min' => 'First Name must be at least 3 characters.',
            'studentfname.max' => 'First Name must not exceed 20 characters.',

            'studentmname.required' => 'Middle Name is required.',
            'studentmname.min' => 'Middle Name must be at least 1 character.',
            'studentmname.max' => 'Middle Name must not exceed 20 characters.',

            'studentlname.required' => 'Last Name is required.',
            'studentlname.min' => 'Last Name must be at least 3 characters.',
            'studentlname.max' => 'Last Name must not exceed 20 characters.',

            'studentaddressline1.required' => 'Address Line 1 is required.',
            'studentaddressline1.min' => 'Address Line 1 must be at least 5 characters.',
            'studentaddressline1.max' => 'Address Line 1 must not exceed 50 characters.',

            'studentaddressline2.required' => 'Address Line 2 is required.',
            'studentaddressline2.min' => 'Address Line 2 must be at least 5 characters.',
            'studentaddressline2.max' => 'Address Line 2 must not exceed 50 characters.',

            'studentcity.required' => 'City is required.',
            'studentcity.min' => 'City must be at least 3 characters.',
            'studentcity.max' => 'City must not exceed 20 characters.',

            'studentpincode.required' => 'Pincode is required.',
            'studentpincode.digits' => 'Pincode must be exactly 6 digits.',

            'studentphoneno.required' => 'Phone number is required.',
            'studentphoneno.digits' => 'Phone number must be exactly 10 digits.',

            'studentemail.required' => 'Email Address is required.',
            'studentemail.email' => 'Please enter a valid Email address.',

            'studentstd.required' => 'Standard is required.',
            'studentstd.integer' => 'Standard must be a number.',
            'studentstd.gt' => 'Standard must be greater than 0.',
            'studentstd.lt' => 'Standard must be less than 13.',

            'studentdob.required' => 'Date Of Birth is required.',
            'studentdob.before' => 'Date Of Birth must be a date before today.',

            'studentrollno.required' => 'Roll Number is required.',
            'studentrollno.regex' => 'Roll Number must contain both letters and numbers.',

            'studentimage.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'studentimage.max' => 'The image must not exceed 2MB in size.',

            'studentstatus.required' => 'Status is required.'
        ]);

        //  $imageName=time().'.'.$request->image->extension();
        //  $request->image->move(public_path('Studentimages'),$imageName);
        $imageName = time() . '.' . $request->studentimage->extension();
        $request->studentimage->move(public_path('Studentimages'), $imageName);

        $studentd = new Studentdata();
        $studentd->firstname = $request->studentfname;
        $studentd->middlename = $request->studentmname;
        $studentd->lastname = $request->studentlname;
        $studentd->addressline1 = $request->studentaddressline1;
        $studentd->addressline2 = $request->studentaddressline2;
        $studentd->city = $request->studentcity;
        $studentd->pincode = $request->studentpincode;
        $studentd->mobileno = $request->studentphoneno;
        $studentd->email = $request->studentemail;
        $studentd->std = $request->studentstd;
        $studentd->dob = $request->studentdob;
        $studentd->rollno = $request->studentrollno;
        $studentd->image = $imageName;
        $studentd->status = $request->studentstatus;
        $studentd->userid = Auth::id();

        $studentd->save();
        return back()->withSuccess('Student Data Inserted Successfully!!!');
    }
    //  if($request){
    //      return "sucess";
    //  }else{
    //      return "failed";
    //  }



    public function edit($rollno)
    {

        // Find the student record by rollno
        $studentrecord = Studentdata::where('rollno', $rollno)->first();

        // If the record is not found, redirect back with an error message
        if (!$studentrecord) {
            return back()->with('error', 'Student record not found!');
        }

        // Return the edit view with the student record
        return view('edit', ['studentrecord' => $studentrecord]);
    }



    public function updaterecord(Request $request, $rollno)
    {
        // Find the student record by rollno
        $studentrecord = Studentdata::where('rollno', $rollno)->first();

        // If the record is not found, redirect back with an error message
        if (!$studentrecord) {
            return back()->with('error', 'Student record not found!');
        }

        // Validate the request data
        $request->validate([
            'studentfname' => 'required | min:3 | max:15',
            'studentmname' => 'required | min:1 | max:15',
            'studentlname' => 'required | min:3 | max:15',
            'studentaddressline1' => 'required | min:5 | max:50',
            'studentaddressline2' => 'required | min:5 | max:50',
            'studentcity' => 'required | min:3 | max:20',
            'studentpincode' => 'required | digits:6',
            'studentphoneno' => 'required | digits:10',
            'studentemail' => 'required | email',
            'studentstd' => 'required | integer | gt:0 | lt:13',
            'studentdob' => 'required | before:today',
            'studentrollno' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
            'studentimage' => 'nullable |mimes:jpeg,png,jpg|max:2048',
            'studentstatus' => 'required'
        ], [
            'studentfname.required' => 'First Name is required.',
            'studentfname.min' => 'First Name must be at least 3 characters.',
            'studentfname.max' => 'First Name must not exceed 15 characters.',

            'studentmname.required' => 'Middle Name is required.',
            'studentmname.min' => 'Middle Name must be at least 1 character.',
            'studentmname.max' => 'Middle Name must not exceed 15 characters.',

            'studentlname.required' => 'Last Name is required.',
            'studentlname.min' => 'Last Name must be at least 3 characters.',
            'studentlname.max' => 'Last Name must not exceed 15 characters.',

            'studentaddressline1.required' => 'Address Line 1 is required.',
            'studentaddressline1.min' => 'Address Line 1 must be at least 5 characters.',
            'studentaddressline1.max' => 'Address Line 1 must not exceed 50 characters.',

            'studentaddressline2.required' => 'Address Line 2 is required.',
            'studentaddressline2.min' => 'Address Line 2 must be at least 5 characters.',
            'studentaddressline2.max' => 'Address Line 2 must not exceed 50 characters.',

            'studentcity.required' => 'City is required.',
            'studentcity.min' => 'City must be at least 3 characters.',
            'studentcity.max' => 'City must not exceed 20 characters.',

            'studentpincode.required' => 'Pincode is required.',
            'studentpincode.digits' => 'Pincode must be exactly 6 digits.',

            'studentphoneno.required' => 'Phone Number is required.',
            'studentphoneno.digits' => 'Phone Number must be exactly 10 digits.',

            'studentemail.required' => 'Email Address is required.',
            'studentemail.email' => 'Please enter a valid Email address.',

            'studentstd.required' => 'Standard is required.',
            'studentstd.integer' => 'Standard must be a number.',
            'studentstd.gt' => 'Standard must be greater than 0.',
            'studentstd.lt' => 'Standard must be less than 13.',

            'studentdob.required' => 'Date Of Birth is required.',
            'studentdob.before' => 'Date Of Birth must be a date before today.',

            'studentrollno.required' => 'Roll Number is required.',
            'studentrollno.regex' => 'Roll Number must contain both letters and numbers.',

            'studentimage.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'studentimage.max' => 'The image must not exceed 2MB in size.',

            'studentstatus.required' => 'Status is required.'
        ]);

        // Update the student record
        $studentrecord->firstname = $request->studentfname;
        $studentrecord->middlename = $request->studentmname;
        $studentrecord->lastname = $request->studentlname;
        $studentrecord->addressline1 = $request->studentaddressline1;
        $studentrecord->addressline2 = $request->studentaddressline2;
        $studentrecord->city = $request->studentcity;
        $studentrecord->pincode = $request->studentpincode;
        $studentrecord->mobileno = $request->studentphoneno;
        $studentrecord->email = $request->studentemail;
        $studentrecord->std = $request->studentstd;
        $studentrecord->dob = $request->studentdob;
        $studentrecord->rollno = $request->studentrollno;
        $studentrecord->status = $request->studentstatus;

        // Handle image upload if a new image is provided
        if ($request->hasFile('studentimage')) {
            $imageName = time() . '.' . $request->studentimage->extension();
            $request->studentimage->move(public_path('Studentimages'), $imageName);
            $studentrecord->image = $imageName;
        }

        // Save the updated record
        $studentrecord->save();

        return back()->withSuccess('Student Data Updated Successfully!!!');
    }



    public function getStudents()
    {
        // $students = \App\Models\Studentdata::all();
        // return view('readrecords',['data'=>$students]);

        $students = Studentdata::where('userid', Auth::id())->latest()->get();
        return view('readrecords', ['data' => $students]);
        // return view('readrecords',['data'=>Studentdata::latest()->get()]);
    }



    public function destroy($rollno)
    {
        // Find the student record by rollno
        $studentrecord = Studentdata::where('rollno', $rollno)->first();

        if ($studentrecord) {
            // Get the image path
            $imagePath = public_path('Studentimages/' . $studentrecord->image);

            // Check if the image file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }

            $studentrecord->delete();

            return back()->with('success', 'Student Data  Deleted Successfully!!!');
        } else {
            return back()->with('error', 'Record not found!');
        }
    }



    public function showIcard($rollno)
    {
        // Fetch the student record by rollno
        $studentrecord = Studentdata::where('rollno', $rollno)->first();

        // If the record is not found, redirect back with an error message
        if (!$studentrecord) {
            return back()->with('error', 'Student record not found!');
        }

        return view('icard', ['studentrecord' => $studentrecord]);
    }



    public function showIcards()
    {
        $students = Studentdata::where('userid', Auth::id())->latest()->get();

        if ($students->isEmpty()) {
            return back()->with('error', 'Student Data not found!');
        }

        return view('icards', ['students' => $students]);
    }



    public function downloadIcard($rollno)
    {
        $studentrecord = Studentdata::where('rollno', $rollno)->first();

        // If the record is not found, return an error
        if (!$studentrecord) {
            return back()->with('error', 'Student record not found!');
        }

        // Debug image paths
        \Log::info('College Logo Path: ' . url('images/collegelogo.png'));
        \Log::info('Student Photo Path: ' . url('Studentimages/' . $studentrecord->image));

        // Generate the PDF 
        $pdf = Pdf::loadView('icard', [
            'studentrecord' => $studentrecord,
            'pdf' => true // Pass a flag to indicate PDF generation
        ]);

        return $pdf->download('icard_' . $studentrecord->rollno . '.pdf');
    }


    public function downloadIcards()
    {
        $students = Studentdata::where('userid', Auth::id())->latest()->get();

        if ($students->isEmpty()) {
            return back()->with('error', 'Student Data not found!');
        }

        // Log student data for debugging
        foreach ($students as $student) {
            \Log::info('College Logo Path: ' . url('images/collegelogo.png'));

            \Log::info('Student Photo Path: ' . url('Studentimages/' . $student->image));
        }

        $pdf = Pdf::loadView('icards', [
            'students' => $students,
            'pdf' => true // Pass a flag to indicate PDF generation
        ]);

        return $pdf->download('icards.pdf');
    }


    public function search(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->input('search');

        // Split the search query into individual parts
        $nameParts = explode(' ', $searchQuery);

        // Initialize the query
        $query = Studentdata::query();

        // Loop through each name part and add conditions to the query
        foreach ($nameParts as $part) {
            $query->orWhere('firstname', 'LIKE', "%{$part}%")
                ->orWhere('middlename', 'LIKE', "%{$part}%")
                ->orWhere('lastname', 'LIKE', "%{$part}%")
                ->orWhere('addressline1', 'LIKE', "%{$part}%")
                ->orWhere('addressline2', 'LIKE', "%{$part}%")
                ->orWhere('city', 'LIKE', "%{$part}%")
                ->orWhere('pincode', 'LIKE', "%{$part}%")
                ->orWhere('rollno', 'LIKE', "%{$part}%")
                ->orWhere('std', 'LIKE', "%{$part}%")
                ->orWhere('mobileno', 'LIKE', "%{$part}%")
                ->orWhere('email', 'LIKE', "%{$part}%");

        }
        // Execute the query and get the results
        $results = $query->get();

        // Return the results to the view
        return view('readrecords', ['data' => $results, 'searched' => $request->search]);
    }


    public function updateStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'firstname' => 'required|min:3|max:15',
            'middlename' => 'required|min:1|max:15',
            'lastname' => 'required|min:3|max:15',
            'addressline1' => 'required | min:5 | max:50',
            'addressline2' => 'required | min:5 | max:50',
            'city' => 'required | min:3 | max:20',
            'pincode' => 'required | digits:6',
            'mobileno' => 'required | digits:10',
            'email' => 'required | email',
            'std' => 'required | integer | gt:0 | lt:13',
            'rollno' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/']

        ], [
            'firstname.required' => 'first name is required.',
            'firstname.min' => 'first name must be at least 3 characters.',
            'firstname.max' => 'first name must not exceed 15 characters.',

            'middlename.required' => 'middle name is required.',
            'middlename.min' => 'middle name must be at least 1 character.',
            'middlename.max' => 'middle name must not exceed 15 characters.',

            'lastname.required' => 'last name is required.',
            'lastname.min' => 'last name must be at least 3 characters.',
            'lastname.max' => 'last name must not exceed 15 characters.',

            'addressline1.required' => 'Address Line 1 is required.',
            'addressline1.min' => 'Address Line 1 must be at least 5 characters.',
            'addressline1.max' => 'Address Line 1 must not exceed 50 characters.',

            'addressline2.required' => 'Address Line 2 is required.',
            'addressline2.min' => 'Address Line 2 must be at least 5 characters.',
            'addressline2.max' => 'Address Line 2 must not exceed 50 characters.',

            'city.required' => 'City is required.',
            'city.min' => 'City must be at least 3 characters.',
            'city.max' => 'City must not exceed 20 characters.',
            'pincode.required' => 'Pincode is required.',
            'pincode.digits' => 'Pincode must be exactly 6 digits.',

            'mobileno.required' => 'Phone number is required.',
            'mobileno.digits' => 'Phone number must be exactly 10 digits.',

            'email.required' => 'Email Address is required.',
            'email.email' => 'Please enter a valid email address.',

            'std.required' => 'Standard is required.',
            'std.integer' => 'Standard must be a number.',
            'std.gt' => 'Standard must be greater than 0.',
            'std.lt' => 'Standard must be less than 13.',

            'rollno.required' => 'Roll number is required.',
            'rollno.regex' => 'Roll number must contain both letters and numbers.'
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); // 422 is the HTTP status code for validation errors
        }

        $student = StudentData::find($request->rollno);
        $student->rollno = $request->rollno;
        $student->std = $request->std;
        $student->firstname = $request->firstname;
        $student->middlename = $request->middlename;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->mobileno = $request->mobileno;
        $student->addressline1 = $request->addressline1;
        $student->addressline2 = $request->addressline2;
        $student->city = $request->city;
        $student->pincode = $request->pincode;

        $student->save();

        return response()->json(['success' => true]);
    }

}