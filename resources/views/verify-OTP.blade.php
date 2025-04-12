@extends('layout')

@section('title', 'VERIFY OTP')

@section('headerbuttons')
    <div class="col-lg-3 text-right">
        <a href="{{ route('login') }}" class="small btn btn-primary mr-3"><span class="icon-unlock-alt"></span> Log In</a>
        <a href="{{ route('register')}}" class="small btn btn-primary px-4 py-2 rounded-1"><span class="icon-users"></span>
            Register</a>
    </div>
@endsection

@section('main')

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Verify OTP</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ route('welcome') }}">Welcome</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('register')}}"> <span class="current">Register / Sign UP</span></a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('showotpform')}}"> <span class="current">Verify OTP</span></a>

        </div>
    </div>

    <div class="site-section">
        <div class="container">



            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify OTP') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verifyotp') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="otp" class="col-md-4 col-form-label text-md-end">{{ __('Enter OTP:') }}</label>

                                <div class="col-md-6">
                                    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror"
                                        name="otp" required autofocus>

                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify') }}
                                    </button>
                                </div>
                            </div>

                            <br>

                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection