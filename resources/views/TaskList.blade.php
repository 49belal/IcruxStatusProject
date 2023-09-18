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
                        <th>Action</th>

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
                                <td><a
                                        href="{{ url('/edittaskdetails/' . $resourcedetails->resource_key . '/' . $resourcedetails->client_name . '/' . $resourcedetails->project_lead . '/' . $resourcedetails->task_description . '/' . $resourcedetails->status) }}"><button
                                        class="status inProgress style="margin-top: 0.5px;margin-left:30px;">Edit</button></a>
                                </td>

                        </tr>
                        <?php $i++; ?>
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

