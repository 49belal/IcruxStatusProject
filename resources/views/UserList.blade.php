@extends('layouts.app2')
@section('head')
    <title>User List</title>



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
            margin-left: 0px;
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
@endsection
@section('menu')

    <body>
        <div>
            <button class="status inProgresss" style="margin-left:25px;margin-top:25px;" onclick="history.go(-1);">Back
            </button>
        </div>
        <div class="details">
            <div class="recentOrders" >
                <div class="cardHeader">
                    <h2>Resource List</h2>

                </div>
                <table id="tableID">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($UserList as $UserList)
                          <tr>
                          <td>{{ $UserList->name }}</td>
                          <td>{{ $UserList->email }}</td>
                          <td><?php
                            if($UserList->type==0){
                                echo("User");
                            }elseif($UserList->type==1){
                                echo ("Admin");
                            }elseif($UserList->type==3){
                                echo ("Team Lead");
                            }elseif($UserList->type==2){
                                echo ("Super Admin");
                            }
                          ?></td>
                           <td><a href="{{ url('/edituserinfo/' . $UserList->email) .'/'. $UserList->name .'/'. $UserList->type }}" ><button class="status inProgress"
                            style="margin-left:10px;" >Edit</button></a></td>
                             <td><a href="{{ url('/deleteuser/' . $UserList->email) }}" ><button class="status inProgress"
                                style="margin-right:70px;" >Delete</button></a></td>
                                {{-- <td><a href="deleteuser/{{ $UserList->email }}"><button class="btn btn-info" style="margin-top: 0.5px;margin-left:30px;" >Delete</button></a></td> --}}

                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            var table = $('#tableID').DataTable({
                paging: true, // Enable pagination
                lengthMenu: [10, 25, 50, 100], // Choose the number of rows per page
                dom: 'Bfrtip', // Add export buttons
                buttons: [
                    'excel', // Excel export button
                    {
                        extend: 'pdf', // PDF export button
                        orientation: 'landscape', // PDF orientation (landscape or portrait)
                        text: 'Export to PDF', // Button text
                        title: 'Feedback Data', // PDF title
                    },
                ],
            });
        });
    </script>
@endsection

