<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app2')
    @section('head')
        <title>Resource List</title>
        <!-- ======= Styles ====== -->
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @endsection
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
</head>
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
                <table>
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
    @endsection

</body>

</html>
