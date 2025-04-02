@extends('layout')

@section('title', 'KANBAN VIEW')

@section('stylecss')
    <style>

    </style>
@endsection

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
                    <h2 class="mb-0">Dashboard</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ route('home') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{ route('dashboard') }}"> <span class="current">Dashboard</span></a>
        </div>
    </div>


    <div class="site-section">
        <div class="container"></div>

<!-- //////////////////////////////////////////////////////////////////////// -->

    </div>
    </div>

@endsection