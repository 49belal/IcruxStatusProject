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
    <thead style="background-color:#138496;color:white">
      <tr>
        <th>Project Key</th>
        <th>Resource Name</th>
        <th>Resource Email</th>
        <th>Rating</th>
        <th>Resource Start Date</th>
        <th>Resource End Date</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($ResourceList as $ResourceList)
      <tr>
      <td>{{ $ResourceList->project_key }}</td>
      <td>{{ $ResourceList->resource_name }}</td>
      <td>{{ $ResourceList->resource_email }}</td>
      <td>{{ $ResourceList->rating }}</td>
      <td>{{ $ResourceList->start_resource_date }}</td>
      <td>{{ $ResourceList->end_resource_date }}</td>
      <td>{{ $ResourceList->remarks }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
</div>
</body>
</html>
