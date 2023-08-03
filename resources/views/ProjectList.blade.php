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
  <h2 class="text-center">List of Projects</h2>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Project Key</th>
        <th>Client Name</th>
        <th>Project Lead</th>
        <th>Resource Name</th>
        <th>Priority</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($ProjectList as $ProjectList)
      <tr>
      <td>{{ $ProjectList->project_key }}</td>
      <td>{{ $ProjectList->client_name }}</td>
      <td>{{ $ProjectList->project_lead }}</td>
      <td>{{ $ProjectList->resource_name }}</td>
      <td>{{ $ProjectList->priority }}</td>
      <td>{{ $ProjectList->start_date }}</td>
      <td>{{ $ProjectList->end_date }}</td>
      <td>{{ $ProjectList->description }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
</div>
</body>
</html>