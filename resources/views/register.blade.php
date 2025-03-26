@extends('layout')

@section('title', 'Registeration Page')

@section('headerbuttons')
  <div class="col-lg-3 text-right">
    <a href="{{ route('login') }}" class="small btn btn-primary mr-3"><span class="icon-unlock-alt"></span> Log In</a>
    <a href="{{ route('register') }}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>
    Register</a>
  </div>
@endsection

@section('main')

  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
    <div class="row align-items-end justify-content-center text-center">
      <div class="col-lg-7">
      <h2 class="mb-0">Register</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
      </div>
    </div>
    </div>
  </div>

  <div class="custom-breadcrumns border-bottom">
    <div class="container">
    <a href="{{ route('welcome') }}">Welcome</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <a href="{{ route('register')}}"> <span class="current">Register</span></a>
    </div>
  </div>

  <div class="site-section">
    <div class="container">


    <div class="row justify-content-center">
      <div class="col-md-5">

      <form action="{{ route('register.post') }}" method="POST" class="register-form">
        @csrf

        <div class="row">

        <div class="col-md-12 form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{ old('name') }}">
          <br><span style="color:red">@error('name') {{ $message }} @enderror</span>

        </div>
        <div class="col-md-12 form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" class="form-control form-control-lg"
          value="{{ old('email') }}">
          <br><span style="color:red">@error('email') {{ $message }} @enderror</span>

        </div>
        <div class="col-md-12 form-group">
          <label for="pword">Password</label>
          <input type="password" id="pword" name="password" class="form-control form-control-lg"
          value="{{ old('password') }}">
          <br><span style="color:red">@error('password') {{ $message }} @enderror</span>

        </div>
        <div class="col-md-12 form-group">
          <label for="pword2">Re-type Password</label>
          <input type="password" id="pword2" name="password_confirmation" class="form-control form-control-lg"
          value="{{ old('password_confirmation') }}">
          <br><span style="color:red">@error('password_confirmation') {{ $message }} @enderror</span>

        </div>
        </div>
        <div class="row">
        <div class="col-12">
          <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
        </div>
        </div>


      </div>
    </div>
    </div>
  </div>
@endsection