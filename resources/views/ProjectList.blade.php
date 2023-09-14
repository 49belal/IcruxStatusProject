<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app2')
    @section('head')
        <title>Project List</title>
        <!-- ======= Styles ====== -->
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @endsection
    <meta charset="utf-8">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
</head>
@section('menu')
    <style>
        .btn {
            background-color: #2196F3;
            color: white;
            padding: 5px;
            font-size: 16px;
            border: none;
            outline: none;
            margin-right: 50px;

        }

        .dropdown {
            position:initial;
            /* display: inline-block; */
            display: block;
            margin: auto;
            margin-top: 1px;


        }

        .dropdown-content {
            display: none;
            position: absolute;
            margin-left: 13px;
            background-color: #f1f1f1;
            min-width: 80px;
            z-index: 1;
            text-align: center;
        }

        .dropdown-content a {
            color: black;
            padding: 8px 10px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .btn:hover,
        .dropdown:hover .btn {
            background-color: #0b7dda;
        }
    </style>

    <body>
        <div>
            <button class="status inProgresss" style="margin-left:25px;margin-top:25px;" onclick="history.go(-1);">Back
            </button>
        </div>


        <div class="details">
            <div class="recentOrders">

                <div class="cardHeader">
                    <h2>List of Projects</h2>

                </div>
                <table style="margin-right: 40px; text-align: center;justify-content: center; ">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Client Name</th>
                            <th>Project Description</th>
                            <th>Project Lead</th>
                            <th>Project Status</th>
                            <th>Priority</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            {{-- <th>View Resource</th>
                            <th>Edit Resource</th>
                            <th>Add Resource</th> --}}
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($ProjectList as $ProjectList)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $ProjectList->client_name }}</td>
                                <td>{{ $ProjectList->description }}</td>

                                <td>{{ $ProjectList->project_lead }}</td>
                                <?php
                                if ($ProjectList->project_status == 'Completed') {
                                    $class = 'status delivered1';
                                } elseif ($ProjectList->project_status == 'InProgress') {
                                    $class = 'status inProgress2';
                                } else {
                                    $class = 'status pending1';
                                }
                                ?>
                                <td><span class="{{ $class }}"
                                        style="margin-right:50px;">{{ $ProjectList->project_status }}</span></td>

                                <td>{{ $ProjectList->priority }}</td>
                                <td><?php $start_todate = explode('-', $ProjectList->start_date);
                                $start__date = $start_todate[2] . '-' . $start_todate[1] . '-' . $start_todate[0]; ?>{{ $start__date }}</td>
                                <td><?php $end_todate = explode('-', $ProjectList->end_date);
                                $end__date = $end_todate[2] . '-' . $end_todate[1] . '-' . $end_todate[0]; ?>{{ $end__date }}</td>

                                {{-- <td><a href="viewresource/{{ $ProjectList->project_key }}"><button
                                            class="status inProgress" style="margin-right:30px;">View</button></a>
                                <td><a href="editproject/{{ $ProjectList->project_key }}"><button class="status inProgress"
                                            style="margin-right:30px;">Edit</button></a>
                                </td>
                                <td><a href="addnewresource/{{ $ProjectList->project_key }}"><button
                                            class="status inProgress" style="margin-left:10px;">Add</button></a></td>
                                </td> --}}



                                    <td class="dropdown" style="position:initial">
                                        <button class="status inProgress">
                                            Action <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-content">
                                            <a href="{{ route('viewresource', ($ProjectList->project_key)) }}">View</a>
                                            <a href="{{ route('addnewresource', ($ProjectList->project_key)) }}">Add</a>
                                            <a href="{{ route('editproject', ($ProjectList->project_key)) }}">Update</a>
                                        </div>

                                </td>

                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

</body>

</html>
