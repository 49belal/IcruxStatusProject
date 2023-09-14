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
                <h2>List of Tasks</h2>

            </div>
            <table id="tableID">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Client Name</th>
                        <th>Project Lead</th>
                        <th>Task Description</th>
                        <th>Task Start Date</th>
                        <th>Task End Date</th>
                        <th>Task Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($resourcedetails as $resourcedetails)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $resourcedetails->client_name }}</td>
                            <td>{{ $resourcedetails->project_lead }}</td>
                            <td>{{ $resourcedetails->task_description }}</td>
                            <td><?php $start_todate = explode('-', $resourcedetails->start_resource_date);
                            $start__date = $start_todate[2] . '-' . $start_todate[1] . '-' . $start_todate[0]; ?>{{ $start__date }}</td>
                            <td><?php $end_todate = explode('-', $resourcedetails->end_resource_date);
                            $end__date = $end_todate[2] . '-' . $end_todate[1] . '-' . $end_todate[0]; ?>{{ $end__date }}</td>
                            {{-- <td><span class="status pending">{{ $ProjectList->priority }}</span></td> --}}
                            <?php
                            if ($resourcedetails->status == 'Completed') {
                                $class = 'status delivered1';
                            } elseif ($resourcedetails->status == 'InProgress') {
                                $class = 'status inProgress1';
                            } else {
                                $class = 'status pending1';
                            }
                            ?>
                            <td><span class="{{ $class }}"
                                    style="margin-right:50px;">{{ $resourcedetails->status }}</span></td>

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
