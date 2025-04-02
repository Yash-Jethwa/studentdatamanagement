@extends('layout')

@section('title', 'STUDENTFORM PAGE')

@section('logoutbtn')
  <div class="col-lg-3 text-right">
    <form action="{{ url('/logout') }}" method="POST">
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


  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
      <h2 class="mb-0">Add Student Data</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
      </div>
    </div>
    </div>
  </div>


  <div class="custom-breadcrumns border-bottom">
    <div class="container">
    <a href="{{ route('home') }}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <a href="{{ route('studentform') }}"> <span class="current">Add Student Data</span></a>
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

    <form action="/studentform" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row">
      <div class="col-md-6 form-group">
        <label for="studentfname">First Name</label>
        <input type="text" id="studentfname" name="studentfname"
        class="form-control form-control-lg @error('studentfname') is-invalid @enderror"
        value="{{old('studentfname')}}">
        <span style="color:red">@error('studentfname') {{$message}} @enderror</span>
      </div>

      <div class="col-md-6 form-group">
        <label for="studentlname">Last Name</label>
        <input type="text" id="studentlname" name="studentlname"
        class="form-control form-control-lg @error('studentlname') is-invalid @enderror"
        value="{{old('studentlname')}}">
        <span style="color:red">@error('studentlname') {{$message}} @enderror</span>
      </div>
      </div>

      <br>

      <div class="row">
      <div class="col-md-6 form-group">
        <label for="studentmname">Middle Name</label>
        <input type="text" id="studentmname" name="studentmname"
        class="form-control form-control-lg @error('studentmname') is-invalid @enderror"
        value="{{old('studentmname')}}">
        <span style="color:red">@error('studentmname') {{$message}} @enderror</span>
      </div>

      <div class="col-md-6 form-group">
        <label for="studentemail">Email Address</label>
        <input type="text" id="studentemail" name="studentemail"
        class="form-control form-control-lg @error('studentemail') is-invalid @enderror"
        value="{{old('studentemail')}}">
        <span style="color:red">@error('studentemail') {{$message}} @enderror</span>
      </div>
      </div>

      <br>

      <div class="row">
      <div class="col-md-6 form-group">
        <label for="studentphoneno">Phone Number</label>
        <input type="number" id="studentphoneno" name="studentphoneno"
        class="form-control form-control-lg @error('studentphoneno') is-invalid @enderror"
        value="{{old('studentphoneno')}}">
        <span style="color:red">@error('studentphoneno') {{$message}} @enderror</span>
      </div>

      <div class="col-md-6 form-group">
        <label for="studentstd">Current Standard</label>
        <input type="number" name="studentstd" id="studentstd"
        class="form-control form-control-lg @error('studentstd') is-invalid @enderror"
        value="{{old('studentstd')}}">
        <span style="color:red">@error('studentstd') {{$message}} @enderror</span>

      </div>
      </div>

      <br>

      <div class="row">
      <div class="col-md-6 form-group">
        <label for="studentdob">Date Of Birth</label>
        <input type="date" id="studentdob" name="studentdob"
        class="form-control form-control-lg @error('studentdob') is-invalid @enderror"
        value="{{old('studentdob')}}">
        <span style="color:red">@error('studentdob') {{$message}} @enderror</span>
      </div>

      <div class="col-md-6 form-group">
        <label for="studentrollno">Roll Number</label>
        <input type="text" name="studentrollno" id="studentrollno"
        class="form-control form-control-lg @error('studentrollno') is-invalid @enderror"
        value="{{old('studentrollno')}}">
        <span style="color:red">@error('studentrollno') {{$message}} @enderror</span>

      </div>
      </div>

      <br>

      <div class="row">
      <div class="col-md-6 form-group">
        <label for="studentaddressline1">Current Address Line 1</label>
        <input type="text" id="studentaddressline1" name="studentaddressline1"
        class="form-control form-control-lg @error('studentaddressline1') is-invalid @enderror"
        value="{{old('studentaddressline1')}}">
        <span style="color:red">@error('studentaddressline1') {{$message}} @enderror</span>
      </div>

      <div class="col-md-6 form-group">
        <label for="studentaddressline2">Current Address Line 2</label>
        <input type="text" name="studentaddressline2" id="studentaddressline2"
        class="form-control form-control-lg @error('studentaddressline2') is-invalid @enderror"
        value="{{old('studentaddressline2')}}">
        <span style="color:red">@error('studentaddressline2') {{$message}} @enderror</span>
      </div>
      </div>

      <br>

      <div class="row">
      <div class="col-md-6 form-group">
        <label for="studentcity">City</label>
        <input type="text" id="studentcity" name="studentcity"
        class="form-control form-control-lg @error('studentcity') is-invalid @enderror"
        value="{{old('studentcity')}}">
        <span style="color:red">@error('studentcity') {{$message}} @enderror</span>
      </div>

      <div class="col-md-6 form-group">
        <label for="studentpincode">PIN Code</label>
        <input type="number" name="studentpincode" id="studentpincode"
        class="form-control form-control-lg @error('studentpincode') is-invalid @enderror"
        value="{{old('studentpincode')}}">
        <span style="color:red">@error('studentpincode') {{$message}} @enderror</span>
      </div>
      </div>

      <br>

      <div class="row">
      <div class="col-md-6 form-group">
        <label for="studentstatus">Status</label>

        <select id="studentstatus" name="studentstatus"
        class="form-control form-control-lg @error('studentstatus') is-invalid @enderror">
        <option value="" selected disabled>---Please Choose An Option---</option>
        <option value="Applied">Applied</option>
        <option value="Test Given">Test Given</option>
        <option value="Test Passed">Test Passed</option>
        <option value="Documents Verification">Documents Verification</option>
        <option value="Rejected">Rejected</option>
        <option value="Fees Paid">Fees Paid</option>
        <option value="Admitted">Admitted</option>
        </select>
        <span style="color:red">@error('studentstatus') {{$message}} @enderror</span>
        <!-- @error('studentstatus')<span class="invalid-feedback" style="color:red">{{ $message }}</span>@enderror -->
      </div>

      <div class="col-md-6 form-group">
        <label for="studentimage">Select Photo</label>
        <input type="file" id="studentimage" name="studentimage"
        class="form-control form-control-lg @error('studentimage') is-invalid @enderror"
        value="{{old('studentimage')}}">
        <span style="color:red">@error('studentimage') {{$message}} @enderror</span>
      </div>
      </div>

      <br>

      <div class="row">
      <div class="col-12">
        <input type="submit" value="SAVE" class="btn btn-primary btn-lg px-5">
      </div>
      </div>
    </form>
    </div>
  </div>
@endsection


<!-- rgb(99, 248, 124) -->
<!-- @if ($errors->any())  {{-- Display validation errors --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->