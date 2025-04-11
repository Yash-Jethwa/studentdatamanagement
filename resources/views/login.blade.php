@extends('layout')

@section('title', 'Login Page')

@section('headerbuttons')
  <div class="col-lg-3 text-right">
    <a href="{{ route('login') }}" class="small btn btn-primary mr-3"><span class="icon-unlock-alt"></span> Log IN</a>
    <a href="{{ route('register')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>
    Register</a>
  </div>
@endsection

@section('main')

  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
    <div class="row align-items-end justify-content-center text-center">
      <div class="col-lg-7">
      <h2 class="mb-0">Log IN / Sign IN</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
      </div>
    </div>
    </div>
  </div>


  <div class="custom-breadcrumns border-bottom">
    <div class="container">
    <a href="{{ route('welcome')}}">Welcome</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <a href="{{ route('login')}}"> <span class="current">Log IN / Sign IN</span></a>
    </div>
  </div>


  <div class="site-section">
    <div class="container">



    <div class="row justify-content-center">
      <div class="col-md-5">

      <form action="{{ route('login.post') }}" method="POST" class="login-form" enctype="multipart/form-data">
        @csrf

        <div class="row">
        <div class="col-md-12 form-group">
          <label for="email">Email ID</label>
          <input type="text" id="email" name="email"
          class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}">
          <span style="color:red"> @error('email') {{$message}} @enderror </span>
        </div>
        </div>

        <br>

        <div class="row">
        <div class="col-md-12 form-group">
          <label for="pword">Password</label>
          <input type="password" id="pword" name="password"
          class="form-control form-control-lg @error('password') is-invalid @enderror"
          value="{{ old('password') }}">
          <span style="color:red">@error('password') {{$message}} @enderror</span>
        </div>
        </div>

        <br>

        <div class="row">
        <div class="col-md-12">
          <a href="{{ route('password.request')}}"> <span class="current">Forgot Password ?</span></a>
        </div>
        </div>

        <br>

        <div class="row">
        <div class="col-12">
          <input type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
        </div>
        </div>
      </form>

      </div>
    </div>



    </div>
  </div>

@endsection