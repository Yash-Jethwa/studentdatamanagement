@extends('layout')

@section('title', 'PSW RESET LINK PAGE')

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
      <h2 class="mb-0">Reset Password Link</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
      </div>
    </div>
    </div>
  </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ route('welcome') }}">Welcome</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('login') }}">Login</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('password.request')}}">Reset Password</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href=""> <span class="current">Reset Password Link</span></a>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">



            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection