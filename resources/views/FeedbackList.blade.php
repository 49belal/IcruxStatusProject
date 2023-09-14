<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app2')
    @section('head')
        <title>Project LIst</title>
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
                <h2>Feedback List</h2>

            </div>
            <table >
                <thead >
                    <tr>
                        <th>Sr No.</th>
                        <th>Resource Name</th>
                        <th>Resource Email</th>
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
                            <td>{{ $FeedbackList->resource_email }}</td>
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
        @endsection

</body>

</html>
