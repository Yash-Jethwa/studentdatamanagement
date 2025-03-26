@extends('layout')

@section('title', 'MARKSENTRY FORM PAGE')

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
                <!-- <li class="has-children">
                                          <a href="about.html" class="nav-link text-left">About Us</a>
                                          <ul class="dropdown">
                                          <li><a href="teachers.html">Our Teachers</a></li>
                                          <li><a href="about.html">Our School</a></li>
                                          </ul>
                                          </li> -->
                <li>
                    <a href="{{ route('studentform') }}" class="nav-link text-left">Add Student Data</a>
                </li>
                <li>
                    <a href="{{ route('readrecords')}}" class="nav-link text-left">Read Students Records</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="nav-link text-left">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('marksentryform') }}" class="nav-link text-left">Marks Entry</a>
                </li>
            </ul>
            </ul>
        </nav>
    </div>
@endsection

@section('main')


    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0">Marks Entry Form</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ route('home') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('marksentryform') }}"> <span class="current">Marks Entry</span></a>
        </div>
    </div>


    <div class="site-section">
        <div class="container">


        
            <form action="/marksentryform" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="studentrollno">Roll NO:</label>
                        <input type="text" id="studentrollno" name="studentrollno" class="form-control form-control-lg"
                            value="{{old('studentrollno')}}">
                        <br><span style="color:red">@error('studentrollno') {{$message}} @enderror</span>

                    </div>

                    <div class="col-md-6 form-group">
                        <label for="mathsmarks">Maths:</label>
                        <input type="text" id="mathsmarks" name="mathsmarks" class="form-control form-control-lg"
                            value="{{old('mathsmarks')}}">
                        <br><span style="color:red">@error('mathsmarks') {{$message}} @enderror</span>

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="sciencemarks">Science:</label>
                        <input type="text" id="sciencemarks" name="sciencemarks" class="form-control form-control-lg"
                            value="{{old('sciencemarks')}}">
                        <br><span style="color:red">@error('sciencemarks') {{$message}} @enderror</span>

                    </div>

                    <div class="col-md-6 form-group">
                        <label for="ssmarks">Social Science:</label>
                        <input type="text" id="ssmarks" name="ssmarks" class="form-control form-control-lg"
                            value="{{old('ssmarks')}}">
                        <br><span style="color:red">@error('ssmarks') {{$message}} @enderror</span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="englishmarks">English:</label>
                        <input type="text" id="englishmarks" name="englishmarks" class="form-control form-control-lg"
                            value="{{old('englishmarks')}}">
                        <br><span style="color:red">@error('englishmarks') {{$message}} @enderror</span>

                    </div>

                    <div class="col-md-6 form-group">
                        <label for="sanskritmarks">Sanskrit:</label>
                        <input type="text" id="sanskritmarks" name="sanskritmarks" class="form-control form-control-lg"
                            value="{{old('sanskritmarks')}}">
                        <br><span style="color:red">@error('sanskritmarks') {{$message}} @enderror</span>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="hindimarks">Hindi:</label>
                        <input type="text" id="hindimarks" name="hindimarks" class="form-control form-control-lg"
                            value="{{old('hindimarks')}}">
                        <br><span style="color:red">@error('hindimarks') {{$message}} @enderror</span>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="gujaratimarks">Gujarati:</label>
                        <input type="text" id="gujaratimarks" name="gujaratimarks" class="form-control form-control-lg"
                            value="{{old('gujaratimarks')}}">
                        <br><span style="color:red">@error('gujaratimarks') {{$message}} @enderror</span>

                    </div>

                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="computermarks">Computer:</label>
                        <input type="text" id="computermarks" name="computermarks" class="form-control form-control-lg"
                            value="{{old('computermarks')}}">
                        <br><span style="color:red">@error('computermarks') {{$message}} @enderror</span>

                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="SAVE" class="btn btn-primary btn-lg px-5">
                    </div>
                </div>

            </form>

        </div>
    </div>


@endsection