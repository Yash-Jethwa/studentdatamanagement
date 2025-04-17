@extends('layout')

@section('title', 'PROFILE')

@section('logoutbtn')
    <div class="col-lg-3 text-right">
        <a href="{{ route('profile') }}" class="small btn btn-primary px-4 py-2 rounded-1"><span
                class="icon-user"></span></a>
        <form action="{{ url('/logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="small btn btn-danger px-4 py2"><span class="icon-sign-out"></span></button>
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
                        <li><a href="{{ route('student.kanban') }}">KanBan View</a></li>
                        <li><a href="{{ route('marksentryform') }}">Marks Entry</a></li>
                        <li><a href="{{ route('customchatbot') }}">Custom ChatBot</a></li>
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
                    <h2 class="mb-0">Profile</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('profile') }}"> <span class="current">Profile</span></a>
        </div>
    </div>


    <div class="site-section">
        <div class="container">



            <div class="row justify-content-center">



                <div class="col-md-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/8246/8246839.png" alt="Profile" width="300"
                        height="300">
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header"><b>{{ __('👤 Profile') }}</b></div>

                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>
                                        <h4 style="color:grey;"> First Name : </h4><br>
                                    </td>
                                    <td>
                                        <h4 style="color:grey;"> {{ $user->firstname }}</h4><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 style="color:grey;"> Last Name : </h4><br>
                                    </td>
                                    <td>
                                        <h4 style="color:grey;"> {{ $user->lastname }}</h4><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 style="color:grey;"> Email ID : </h4><br>
                                    </td>
                                    <td>
                                        <h4 style="color:grey;"> {{ $user->email }}</h4><br>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>



            </div>


        </div>
    </div>
@endsection