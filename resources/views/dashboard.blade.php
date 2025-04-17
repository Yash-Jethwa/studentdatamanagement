@extends('layout')

@section('title', 'DASHBOARD PAGE')

@section('stylecss')

    <style>
        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .card-title {
            text-align: center;
            /* margin-top: 20%; */
            /* font-size: 24px; */
            /* color: green; */
            animation: blink 1s infinite;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

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
        <div class="container">




            <div class="row row-cols-1 row-cols-md-4 g-4">

                <div class="col">
                    <div class="card text-bg-primary mb-3" style="max-width: 18rem;box-shadow:15px 15px 5px lightgray;">
                        <div class="card-header">Total Students in System</div>
                        <div class="card-body">
                            <h1 class="card-title">{{ $totalstudentsystem }}</h1>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>



                <div class="col">
                    <div class="card text-bg-success mb-3" style="max-width: 18rem;box-shadow:15px 15px 5px lightgray;">
                        <div class="card-header"> Your Total Students</div>
                        <div class="card-body">
                            <h1 class="card-title" style="text-align:center">{{ $totalyrstudent }}</h1>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card text-bg-dark mb-3" style="max-width: 18rem;box-shadow:15px 15px 5px lightgray;">
                        <div class="card-header">Total Users In System</div>
                        <div class="card-body">
                            <h1 class="card-title">{{ $totalusersystem }}</h1>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card types: success , danger , primary , secondary , dark , warning , info -->


            <br><br><br><br><br><br>

            <div style="width: 70%; margin: auto; padding:10px ;border:1px solid gray;box-shadow:15px 15px 5px lightgray;">
                <canvas id="mylineChart"></canvas>
            </div>
            <br><br><br><br><br>
            <div style="width: 70%; margin: auto; padding:10px ;border:1px solid gray;box-shadow:15px 15px 5px lightgray;">
                <canvas id="mybarChart"></canvas>
            </div>
            <br><br><br>



        </div>
    </div>
@endsection

@section('scriptcode')

    <script>
        // Pass PHP data to JavaScript
        const months = @json($months); // Convert PHP array to JSON
        const monthCount = @json($monthCount); // Convert PHP array to JSON

        // Chart configuration
        const ctx = document.getElementById('mylineChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', // Chart type
            data: {
                labels: months, // X-axis labels (months)
                datasets: [{
                    label: 'Number Of Students In System by Month', // Dataset label
                    data: monthCount, // Y-axis data (count of students)
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Fill color
                    borderColor: 'rgba(54, 162, 235, 1)', // Line color
                    borderWidth: 2, // Line width
                    pointRadius: 5, // Point radius
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)', // Point fill color
                    pointBorderColor: '#fff', // Point border color
                    pointHoverRadius: 7, // Point hover radius
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Months' // X-axis title
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number Of Students' // Y-axis title
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top', // Legend position
                    }
                }
            }
        });
    </script>


    <script>

        const ctxb = document.getElementById('mybarChart').getContext('2d');
        const userChart = new Chart(ctxb, {
            type: 'bar',
            data: {
                labels: @json($monthsb),
                datasets: [{
                    label: 'Number of Users By Month',
                    data: @json($datab),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Users'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    }
                }
            }

        });

    </script>

@endsection