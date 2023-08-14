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
  <h2 class="text-center">Task Details</h2>
  <table class="table table-bordered table-striped" style="width:75%">
    @foreach ($userdetails as $userdetails)
        <tr>
            <th>Project Key:</th>
            <td>{{ $userdetails->project_key }}</td>
        </tr>


    @endforeach
  </table>
  @endsection
</div>
</body>
</html>
