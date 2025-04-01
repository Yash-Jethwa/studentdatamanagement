<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;

// Default route (root URL)
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home'); // If user is logged in, redirect to welcome page
    } else {
        // return redirect()->route('login'); 
        //  If user is not logged in, redirect to login page
        return redirect()->route('welcome');

    }
});

// Routes for guests (unauthenticated users)
Route::middleware(['guest', 'preventBackHistory'])->group(function () {
    Route::view('/register', 'register')->name('register');
    Route::view('/login', 'login')->name('login'); // GET route for showing the login form
    Route::view('/welcome', 'welcome')->name('welcome');

    // Route::view('/test', 'test')->name('test');

    Route::post('/login', [StudentController::class, 'login'])->name('login.post'); // POST route for handling login
    Route::post('/register', [StudentController::class, 'register'])->name('register.post'); // POST route for handling registration
});

// Routes for authenticated users
Route::middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::view('/icards', 'icards')->name('icards');
    Route::view('/home', 'home')->name('home');
    Route::view('/studentform', 'studentform')->name('studentform');
    Route::view('/marksentryform', 'marksentryform')->name('marksentryform');
    Route::view('/customchatbot', 'customchatbot')->name('customchatbot');
    

    Route::get('/readrecords', [StudentController::class, 'getStudents'])->name('readrecords');
    Route::post('/studentform', [StudentController::class, 'add'])->name('studentform.post');
    Route::get('/edit/{rollno}', [StudentController::class, 'edit'])->name('edit');
    Route::put('/edit/{rollno}', [StudentController::class, 'updaterecord'])->name('edit.put');
    Route::delete('/delete/{rollno}', [StudentController::class, 'destroy'])->name('delete');
    Route::get('/icard/{rollno}', [StudentController::class, 'showIcard'])->name('icard');
    Route::get('/icard/download/{rollno}', [StudentController::class, 'downloadIcard'])->name('icard.download');
    Route::get('/search', [StudentController::class, 'search'])->name('search');
    Route::post('/logout', [StudentController::class, 'logout'])->name('logout');

    Route::get('/icards', [StudentController::class, 'showIcards'])->name('icards');
    Route::get('/icards/download', [StudentController::class, 'downloadIcards'])->name('icards.download');

    Route::post('/update-student', [StudentController::class, 'updateStudent'])->name('update.student');

    Route::get('/dashboard', [StudentController::class,'dashboard'])->name('dashboard');

    Route::post('/marksentryform', [StudentController::class,'marksentryform'])->name('marksentryform.post');
    
});


// Route::get('/readrecords/{rollno}/edit', [StudentController::class, 'edit'])->name('edit.get');
// Route::put('/readrecords/{rollno}/update', [StudentController::class, 'updaterecord'])->name('update.');
