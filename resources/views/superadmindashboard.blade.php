<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @extends('layouts.app2')
    @section('head')
        <title>Dashboard</title>
        <!-- ======= Styles ====== -->
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @endsection
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
            position: initial;
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

        <!-- ======================= Cards ================== -->
        <div class="cardBox">

            <div class="card" onclick="location.href='{{ route('ProjectStatus', 'Completed') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <?php
                    $a = 0;
                    $b = 0;
                    $c = 0;
                    foreach ($ProjectList as $ProjectList_a) {
                        if ($ProjectList_a->project_status == 'InProgress') {
                            $a++;
                        } elseif ($ProjectList_a->project_status == 'OnHold') {
                            $b++;
                        } else {
                            $c++;
                        }
                    }
                    $d = $a + $b + $c;
                    ?>
                    <div class="numbers" style="centre">{{ $a }}</div>

                    <div class="cardName">InProgress Projects</div>
                </div>


            </div>

            <div class="card" onclick="location.href='{{ route('ProjectStatus', 'OnHold') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers" style="centre">{{ $b }}</div>
                    <div class="cardName">OnHold Projects</div>
                </div>


            </div>

            <div class="card" onclick="location.href='{{ route('ProjectStatus', 'InProgress') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers" style="centre">{{ $c }}</div>
                    <div class="cardName">Completed Projects</div>
                </div>


            </div>

            <div class="card" onclick="location.href='{{ route('ProjectList') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers" style="centre">{{ $d }}</div>
                    <div class="cardName">All Projects</div>
                </div>


            </div>
        </div>

        <!-- ================ Order Details List ================= -->
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
                                        <a href="{{ route('viewresource', $ProjectList->project_key) }}">View</a>
                                        <a href="{{ route('addnewresource', $ProjectList->project_key) }}">Add</a>
                                        <a href="{{ route('editproject', $ProjectList->project_key) }}">Update</a>
                                    </div>

                                </td>

                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>





        </div>


        {{-- <!-- =========== Scripts =========  -->
        <script src="js/main.js"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> --}}
    </body>

    </html>
    <script>
        /* Initialization of datatable */
        $(document).ready(function() {
            $('#tableID').details({});
        });
    </script>
@endsection
