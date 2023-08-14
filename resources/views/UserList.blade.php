<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.app')
    @section('content')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2 class="text-center">List of Users</h2>

  <table class="table table-bordered table-striped">
    <thead style="background-color:#138496;color:white">
      <tr>
        <th>User Name</th>
        <th>User Email</th>
        <th>Role</th>
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
            <td><a href="deleteuser/{{ $UserList->email }}"><button class="btn btn-info" style="margin-top: 0.5px;margin-left:30px;" >Delete</button></a></td>

      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
</div>
</body>
</html>
