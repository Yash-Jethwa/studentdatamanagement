<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title> {{ $studentrecord->rollno }} RollNO Student I-CARD </title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 1);
            max-width: 300px;
            margin: auto;
            text-align: center;
            padding: 20px;
            border: 1px solid rgb(90, 90, 90);
            border-radius: 7px;
        }

        .card img {
            width: 125px;
            height: 125px;

            margin-bottom: 10px;
        }

        .card h6 {
            margin: 2px 0;
            color: white;
        }

        .card table {
            width: 100%;
            margin-top: 15px;
        }

        .card table td {
            padding: 8px;
            text-align: left;
        }

        .card table td:first-child {
            font-weight: bold;
        }

        /* .download-btn {
              border:none;
      padding: 16px 32px;
      text-align: center;
      font-size: 16px;
      margin: 4px 2px;
      transition: 0.15s;
      cursor: pointer;
     
      text-decoration: none;
      border-radius: 8px;
      color: white;
      background-color: blue;
    }
    .download-btn:active {transform:scale(0.88)} */
    </style>
</head>

<body>
    <div class="card">

        <div>
            <img src="{{ public_path('images/collegelogo.png') }}" style="width:100%">
        </div>

        <div style="text-align: center; background-color: rgb(121, 51, 1); color: white; padding: 10px;">
            <h6><strong>STUDENT ID CARD</strong></h6>
        </div>
        <div style="text-align : center">
            <img src="{{ public_path('Studentimages/' . $studentrecord->image) }}" style="width:150px; height:150px ;">

        </div>
        <table>
            <tr>
                <td>Name:</td>
                <td>{{ $studentrecord->firstname }} {{ $studentrecord->middlename }} {{ $studentrecord->lastname }}</td>
            </tr>
            <tr>
                <td>Roll NO:</td>
                <td>{{ $studentrecord->rollno }}</td>
            </tr>
            <tr>
                <td>Birth Date:</td>
                <td>{{ date('d/m/Y', strtotime($studentrecord->dob)) }}</td>
            </tr>
            <tr>
                <td>Standard:</td>
                <td>{{ $studentrecord->std }}</td>
            </tr>
            <tr>
                <td>Phone NO:</td>
                <td>{{ $studentrecord->mobileno }}</td>
            </tr>
            <tr>
                <td>Email ID:</td>
                <td>{{ $studentrecord->email }}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>{{ $studentrecord->addressline1 }}, {{ $studentrecord->addressline2 }}, {{ $studentrecord->city }},
                    {{ $studentrecord->pincode }}
                </td>
            </tr>
            <tr>
                <td> Age : </td>
                <td>
                    @php
                        $dob = new DateTime($studentrecord->dob); // Assuming 'dob' is the column name for date of birth
                        $now = new DateTime();
                        $age = $now->diff($dob)->y; // Calculate age
                        echo $age . " Years";
                    @endphp
                </td>
            </tr>
        </table>
    </div>
</body>

</html>