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
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Resource List</h2>

                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Resource Name</th>
                            <th>Resource Email</th>
                            <th>Task Description</th>
                            <th>Resource Start Date</th>
                            <th>Resource End Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Edit Resource</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($ResourceList as $ResourceList)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $ResourceList->resource_name }}</td>
                                <td>{{ $ResourceList->resource_email }}</td>
                                <td>{{ $ResourceList->task_description }}</td>
                                <td>{{ $ResourceList->start_resource_date }}</td>
                                <td>{{ $ResourceList->end_resource_date }}</td>
                                <td>{{ $ResourceList->status }}</td>
                                <td>{{ $ResourceList->remarks }}</td>
                                <td><a
                                        href="{{ url('/editresourcedetails/' . $ResourceList->project_key . '/' . $ResourceList->resource_name . '/' . $ResourceList->resource_email . '/' . $ResourceList->start_resource_date . '/' . $ResourceList->end_resource_date . '/' . $ResourceList->task_description . '/' . $ResourceList->status) }}"><button
                                        class="status inProgress style="margin-top: 0.5px;margin-left:30px;">Edit</button></a>
                                </td>
                                {{-- <td><a href="/editresourcedetails/{{ $ResourceList->project_key }}/{{ $ResourceList->resource_email }}/{{ $ResourceList->start_resource_date }}"><button class="btn btn-info" style="margin-top: 0.5px;margin-left:30px;" >Edit</button></a></td> --}}
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
