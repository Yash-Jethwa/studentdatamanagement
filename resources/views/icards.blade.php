<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL STUDENTS ICARDS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 9;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 1);
            display: inline-block;
            max-width: 49%;
            margin: 5px 1px;
            /* margin-bottom:6px; */
            /* text-align: center; */
            padding: 5px 0px;
            border: 1px solid rgb(90, 90, 90);
            border-radius: 7px;
        }

        .card table {
            width: 100%;
            /* margin-top: 15px; */
        }

        .card table td {
            padding: 0px;
            text-align: left;
        }

        .card table td:first-child {
            font-weight: bold;
        }
    </style>
</head>

<body>

    @foreach ($students as $student)

        <div class="card">
            <div>
                <img src="{{ public_path('images/collegelogo1.png') }}" style=" width:100% ;">
            </div>

            <div style=" width:100% ; color : white ; background-color : brown; text-align : center;">
                <strong> STUDENT ID CARD </strong>
            </div>
            <div>
                <table style="width:100% ;">
                    <tr>
                        <td> <strong>Name:</strong> </td>
                        <td colspan="2"> {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }} </td>
                        <td></td>
                        <td> </td>
                        <td rowspan="4"> <img src="{{ public_path('Studentimages/' . $student->image) }}"
                                style="width:75px; height:75px;"> </td>
                    </tr>

                    <tr>
                        <td> <strong>rollNo:</strong> </td>
                        <td> {{ $student->rollno }} </td>
                        <td> <strong> Std : </strong> </td>
                        <td> {{ $student->std }} </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> <strong>Age:</strong> </td>
                        <td> @php
                            $dob = new DateTime($student->dob); // Assuming 'dob' is the column name for date of birth
                            $now = new DateTime();
                            $age = $now->diff($dob)->y; // Calculate age
                            echo $age . " Years";
                          @endphp </td>
                        <td> <strong>phone:</strong> </td>
                        <td> {{ $student->mobileno }} </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>address:</td>
                        <td>{{ $student->addressline1 }},<br>{{ $student->addressline2 }},<br>{{ $student->city }},{{ $student->pincode }}.
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    @endforeach
</body>

</html>


<!-- <img src="{{ public_path('Studentimages/'.$student->image) }}" style="width:100px; height:100px ;"> -->