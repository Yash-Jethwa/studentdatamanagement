@extends('layout')

@section('title', 'EDIT STUDENT DATA : {{$studentrecord->rollno}}')

<!-- 
@if($errors->any())
@foreach($errors->all() as $error)
<div style="color:red">
   {{$error}}
</div>
@endforeach
@endif -->

@section('logoutbtn')
    <div class="col-lg-3 text-right">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="small btn btn-danger">LOGOUT</button>
        </form>
    </div>
@endsection

@section('navbar')
    <div class="mr-auto">
        <nav class="site-navigation position-relative text-right" role="navigation">
            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                    <a href="{{ route('home')}}" class="nav-link text-left">Home</a>
                </li>
                <li>
                    <a href="{{ route('studentform') }}" class="nav-link text-left">Add Student Data</a>
                </li>
                <li>
                    <a href="{{ route('readrecords')}}" class="nav-link text-left">Read Students Records</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="nav-link text-left">Dashboard</a>
                </li>
                <li class="has-children">
                    <a class="nav-link text-left">Others</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('customchatbot') }}">Custom ChatBot</a></li>
                        <li><a href="{{ route('marksentryform') }}">Marks Entry</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('main')

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('/images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0"> Edit Data Of Roll Number : {{$studentrecord->rollno}} </h2>
                    @if (Session::has('success'))
                        <h4><strong> Updated </strong></h4>

                    @endif
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ route('home') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('readrecords') }}">Read Student Data</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Edit Student Data</span>

        </div>
    </div>

    <!-- @if($message=Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" style="text-align:center">
                <strong> <h4> <i> {{$message}} </i> </h4></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif -->

    <div class="site-section">
        <div class="container">
            <form action="/edit/{{$studentrecord->rollno}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentfname">First Name</label>
                        <input type="text" id="studentfname" name="studentfname" class="form-control form-control-lg"
                            value="{{old('studentfname', $studentrecord->firstname)}}">
                        <br><span style="color:red">@error('studentfname') {{$message}} @enderror</span>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="studentlname">Last Name</label>
                        <input type="text" id="studentlname" name="studentlname" class="form-control form-control-lg"
                            value="{{old('studentlname', $studentrecord->lastname)}}">
                        <br><span style="color:red">@error('studentlname') {{$message}} @enderror</span>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentmname">Middle Name</label>
                        <input type="text" id="studentmname" name="studentmname" class="form-control form-control-lg"
                            value="{{old('studentmname', $studentrecord->middlename)}}">
                        <br><span style="color:red">@error('studentmname') {{$message}} @enderror</span>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="studentemail">Email Address</label>
                        <input type="text" id="studentemail" name="studentemail" class="form-control form-control-lg"
                            value="{{old('studentemail', $studentrecord->email)}}">
                        <br><span style="color:red">@error('studentemail') {{$message}} @enderror</span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentphoneno">Phone Number</label>
                        <input type="number" id="studentphoneno" name="studentphoneno" class="form-control form-control-lg"
                            value="{{old('studentphoneno', $studentrecord->mobileno)}}">
                        <br><span style="color:red">@error('studentphoneno') {{$message}} @enderror</span>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="studentstd">Current Standard</label>
                        <input type="number" name="studentstd" id="studentstd" class="form-control"
                            value="{{old('studentstd', $studentrecord->std)}}">
                        <br><span style="color:red">@error('studentstd') {{$message}} @enderror</span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentdob">Date Of Birth</label>
                        <input type="date" id="studentdob" name="studentdob" class="form-control form-control-lg"
                            value="{{old('studentdob', $studentrecord->dob)}}">
                        <br><span style="color:red">@error('studentdob') {{$message}} @enderror</span>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="studentrollno">Roll Number</label>
                        <input type="text" name="studentrollno" id="studentrollno" class="form-control"
                            value="{{old('studentrollno', $studentrecord->rollno)}}">
                        <br><span style="color:red">@error('studentrollno') {{$message}} @enderror</span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentaddressline1">Current Address Line 1</label>
                        <input type="text" id="studentaddressline1" name="studentaddressline1"
                            class="form-control form-control-lg"
                            value="{{old('studentaddressline1', $studentrecord->addressline1)}}">
                        <br><span style="color:red">@error('studentaddressline1') {{$message}} @enderror</span>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="studentaddressline2">Current Address Line 2</label>
                        <input type="text" name="studentaddressline2" id="studentaddressline2" class="form-control"
                            value="{{old('studentaddressline2', $studentrecord->addressline2)}}">
                        <br><span style="color:red">@error('studentaddressline2') {{$message}} @enderror</span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentcity">City</label>
                        <input type="text" id="studentcity" name="studentcity" class="form-control form-control-lg"
                            value="{{old('studentcity', $studentrecord->city)}}">
                        <br><span style="color:red">@error('studentcity') {{$message}} @enderror</span>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="studentpincode">PIN Code</label>
                        <input type="number" name="studentpincode" id="studentpincode" class="form-control"
                            value="{{old('studentpincode', $studentrecord->pincode)}}">
                        <br><span style="color:red">@error('studentpincode') {{$message}} @enderror</span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentimage">Select Photo</label>
                        <input type="file" id="studentimage" name="studentimage" class="form-control form-control-lg"
                            value="{{old('studentimage')}}">
                        <br><span style="color:red">@error('studentimage') {{$message}} @enderror</span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="UPDATE RECORD" class="btn btn-primary btn-lg px-5">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection