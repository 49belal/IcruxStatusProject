@extends('layouts.app2')
@section('head')
    <title>Feedback List</title>



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
                <h2>Feedback List</h2>

            </div>
            <table id="tableID">
                <thead >
                    <tr>
                        <th>Sr No.</th>
                        <th>Resource Name</th>
                        {{-- <th>Resource Email</th> --}}
                        <th>Client Name</th>
                        <th>Task Description</th>
                        <th>Project Lead</th>
                        <th>Timely Completion</th>
                        <th>Logic</th>
                        <th>Overall</th>
                        <th>Completion Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($FeedbackList as $FeedbackList)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $FeedbackList->resource_name }}</td>
                            {{-- <td>{{ $FeedbackList->resource_email }}</td> --}}
                            <td>{{ $FeedbackList->client_name }}</td>
                            <td>{{ $FeedbackList->task_description }}</td>
                            <td>{{ $FeedbackList->project_lead }}</td>
                            <td>{{ $FeedbackList->time }}</td>
                            <td>{{ $FeedbackList->logic }}</td>
                            <td>{{ $FeedbackList->overall_experience }}</td>
                            <td><?php $end_todate = explode('-', $FeedbackList->end_resource_date);
                                $end__date = $end_todate[2] . '-' . $end_todate[1] . '-' . $end_todate[0];?>{{ $end__date }}</td>
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

