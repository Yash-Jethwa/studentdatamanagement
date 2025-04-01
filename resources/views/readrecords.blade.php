@extends('layout')

@section('csrftoken')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('stylecss')
  <style>
    td {
    border-bottom: 1px solid gray;
    text-align: center;
    /* border-bottom-color:gray; */
    /* border: 1px solid gray; */
    /* border-collapse: collapse; */
    }

    th {
    /* border: 1px solid gray; */
    background-color: rgb(188, 249, 249);
    text-align: center;
    }

    .image-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.9);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    }

    .image-container img {
    max-width: 90%;
    max-height: 90%;
    }

    .close-button {
    position: absolute;
    top: 20px;
    right: 20px;
    padding: 10px 15px;
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 20px;
    }

    .button {
    display: inline-block;
    border-radius: 7px;
    background-color: #04AA6D;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 15px;
    padding: 10px 18px;
    width: 140px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
    }

    .button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
    }

    .button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
    }

    .button:hover span {
    padding-right: 20px;
    }

    .button:hover span:after {
    opacity: 1;
    right: 0;
    }

    .btnupdate,
    .btndel,
    .btnicard,
    .btneditrow {
    display: inline-block;
    border-radius: 7px;
    /* background-color: #f4511e; */
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 13px;
    padding: 11px 10px;
    width: 80px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
    }

    .btnupdate span,
    .btndel span,
    .btnicard span,
    .btneditrow span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
    }

    .btnupdate span:after,
    .btndel span:after,
    .btnicard span:after,
    .btneditrow span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
    }

    .btnupdate:hover span,
    .btndel:hover span,
    .btnicard:hover span,
    .btneditrow:hover span {
    padding-right: 25px;
    }

    .btnupdate:hover span:after,
    .btndel:hover span:after,
    .btnicard:hover span:after,
    .btneditrow:hover span:after {
    opacity: 1;
    right: 0;
    }

    .btnupdate {
    background-color: rgb(80, 208, 251);
    }

    .btndel {
    background-color: rgb(252, 89, 89);
    }

    .btnicard {
    background-color: rgb(252, 177, 97);
    }

    .btneditrow {
    background-color: #51be78;
    }

    .btnupdate:active,
    .btndel:active,
    .btnicard:active,
    .btneditrow:active {
    transform: scale(0.9);
    }

    .close-button:hover {
    color: black
    }

    .error {
    color: red;
    font-size: 12px;
    margin-top: 5px;
    }
  </style>
@endsection

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
  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
      <h2 class="mb-0">Read Student Data Records</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
      </div>
    </div>
    </div>
  </div>

  <div class="custom-breadcrumns border-bottom">
    <div class="container">
    <a href="{{ route('home') }}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <a href="{{ route('readrecords') }}"><span class="current">Read Students Data Records</span></a>
    </div>
  </div>

  <table width="100%">
    <tr>
    <td>
      <form method="GET" action="/search">
      <input type="text" name="search" value="{{ @$searched }}"
        style="width: 19%; margin-left: 10%; border: 1.5px solid gray; border-radius: 5%;">
      <button type="submit" class="button" style="vertical-align:middle"><span>SEARCH</span></button>
      </form>
    </td>
    <td>
      <a href="/icards/download"><button class="button" style="vertical-align:middle;"><span>PRINT
        ALL</span></button></a>
    </td>
    </tr>
  </table>

  <div>
    <table style="width: 99%; margin-top: 7%; margin-left: 0.5%; margin-bottom: 20%;" id="myTable">
    <tr class="view" style="background-color: rgb(249, 217, 207)">
      <td colspan="11">View</td>
    </tr>
    <thead>
      <tr>
      <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer"> Sr. No<i
        class="fa fa-sort"></i></th>
      <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer"> Photo </th>
      <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')" style="cursor:pointer"> Roll_No+STD <i
        class="fa fa-sort"></i></th>
      <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(4)')" style="cursor:pointer"> Name <i
        class="fa fa-sort"></i></th>
      <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(5)')" style="cursor:pointer"> Address <i
        class="fa fa-sort"></i></th>
      <th> Contact Details </th>
      <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(6)')" style="cursor:pointer"> Age(Yrs) <i
        class="fa fa-sort"></i></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $student)
      <!-- <td class="item" data-id="{{ $student->rollno }}"> -->
      <tr class="item" data-id="{{ $student->rollno }}">

      <td>{{ $loop->index + 1 }}</td>

      <td>
      <img src="Studentimages/{{ $student->image }}" class="rounded-circle clickable-image" width="50" height="50"
      alt="{{ $student->rollno }} student image" data-src="Studentimages/{{ $student->image }}">
      </td>

      <td>
      <span class="academicdetails">{{ $student->rollno }}-{{ $student->std }}</span>
      <div class="edit-fields" style="display: none;">
      <input type="text" class="rollno" value="{{ $student->rollno }}">
      <input type="text" class="std" value="{{ $student->std }}">
      </div>
      </td>

      <td>
      <span class="name">{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}</span>
      <div class="edit-fields" style="display: none;">
      <input type="text" class="firstname" value="{{ $student->firstname }}">
      <input type="text" class="middlename" value="{{ $student->middlename }}">
      <input type="text" class="lastname" value="{{ $student->lastname }}">
      </div>
      </td>

      <td>
      <span class="address">{{ $student->addressline1 }} {{ $student->addressline2 }} {{ $student->city }}
      {{ $student->pincode }}</span>
      <div class="edit-fields" style="display: none;">
      <input type="text" class="addressline1" value="{{ $student->addressline1 }}">
      <input type="text" class="addressline2" value="{{ $student->addressline2 }}">
      <input type="text" class="city" value="{{ $student->city }}">
      <input type="text" class="pincode" value="{{ $student->pincode }}">
      </div>
      </td>

      <td>
      <span class="contact">{{ $student->mobileno }}<br>{{ $student->email }}</span>
      <div class="edit-fields" style="display: none;">
      <input type="text" class="mobileno" value="{{ $student->mobileno }}">
      <input type="text" class="email" value="{{ $student->email }}">
      </div>
      </td>

      <td>
      @php
    $dob = new DateTime($student->dob);
    $now = new DateTime();
    $age = $now->diff($dob)->y;
    echo $age;
  @endphp
      </td>

      <td style="background-color: rgb(249, 197, 181)">
      <a href="/edit/{{ $student->rollno }}"><button class="btnupdate"
        style="vertical-align:middle"><span>EDIT</span></button></a>
      </td>
      <td style="background-color: rgb(249, 197, 181)">
      <form action="/delete/{{ $student->rollno }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btndel" style="vertical-align:middle"><span>DEL</span></button>
      </form>
      </td>
      <td style="background-color: rgb(249, 197, 181)">
      <a href="/icard/download/{{ $student->rollno }}"><button class="btnicard"
        style="vertical-align:middle"><span>PRINT</span></button></a>
      </td>
      <td style="background-color: rgb(249, 197, 181)">
      <button class="btneditrow"><span> E.R. </span></button>
      <button class="btnsaverow"
      style="display:none ; vertical-align:middle ; background-color:brown ; color:white ; border:none ; border-radius:5px ; padding:8px ;"><span>SAVE</span></button>
      </td>
      </tr>
    @endforeach
    </tbody>
    </table>
  </div>

  <div class="image-container" id="imageContainer">
    <img src="" class="image" id="fullSizeImage">
    <button class="close-button" id="closeButton">X</button>
  </div>


  <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="errorModalLabel">Validation Error</h5>
      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
      <span aria-hidden="true">&times;</span>
      </button> -->
      </div>
      <div class="modal-body">
      <!-- Error messages will be displayed here -->
      </div>
      <div class="modal-footer">
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button> -->
      </div>
    </div>
    </div>
  </div>
@endsection



@section('ajaxcode')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
    // Show edit fields and toggle buttons
    $('.btneditrow').click(function () {
      var row = $(this).closest('tr');
      row.find('.academicdetails').hide();
      row.find('.name').hide();
      row.find('.address').hide();
      row.find('.contact').hide();
      row.find('.edit-fields').show();
      $(this).hide();
      row.find('.btnsaverow').show();
    });

    // Handle save button click
    $('.btnsaverow').click(function () {
      var row = $(this).closest('tr');
      var rollno = row.data('id');

      var std = row.find('.std').val();
      var rollno = row.find('.rollno').val();
      var firstname = row.find('.firstname').val();
      var middlename = row.find('.middlename').val();
      var lastname = row.find('.lastname').val();
      var addressline1 = row.find('.addressline1').val();
      var addressline2 = row.find('.addressline2').val();
      var city = row.find('.city').val();
      var pincode = row.find('.pincode').val();
      var mobileno = row.find('.mobileno').val();
      var email = row.find('.email').val();


      $.ajax({
      url: '/update-student',
      method: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        rollno: rollno,
        std: std,
        firstname: firstname,
        middlename: middlename,
        lastname: lastname,
        addressline1: addressline1,
        addressline2: addressline2,
        city: city,
        pincode: pincode,
        mobileno: mobileno,
        email: email
      },
      success: function (response) {
        if (response.success) {
        row.find('.academicdetails').text(rollno + '-' + std).show();
        row.find('.name').text(firstname + ' ' + middlename + ' ' + lastname).show();
        row.find('.address').text(addressline1 + ' ' + addressline2 + ' ' + city + ' ' + pincode).show();
        row.find('.contact').text(mobileno + '\n' + email).show();

        row.find('.edit-fields').hide();
        row.find('.btnsaverow').hide();
        row.find('.btneditrow').show();
        }
      }


      , error: function (response) {
        // Handle validation errors
        var errors = response.responseJSON.errors;
        var errorMessage = '';

        // Loop through errors and create a message
        for (var field in errors) {
        errorMessage += errors[field].join('<br>') + '<br>';
        }

        // Display the error message (e.g., using a modal or alert)
        $('#errorModal .modal-body').html(errorMessage); // Update modal content
        $('#errorModal').modal('show');
      }


      });
    });
    });
  </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection