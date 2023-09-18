<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @extends('layouts.app2')
    @section('head')
        <title>Dashboard</title>
        <!-- ======= Styles ====== -->
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @endsection
</head>
@section('menu')

    <body>
        <div>
            <button class="status inProgresss" style="margin-left:25px;margin-top:25px;" onclick="history.go(-1);">Back
            </button>
        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">

            <div class="card" onclick="location.href='{{ route('TaskInprogress') }}'"
            style="text-align: center;cursor:pointer;">
                <div>
                    <?php
                    $a = 0;
                    $b = 0;
                    $c = 0;
                    foreach ($resourcedetails as $resourcedetails_a) {
                        if ($resourcedetails_a->status == 'InProgress') {
                            $a++;
                        } elseif ($resourcedetails_a->status == 'OnHold') {
                            $b++;
                        } else {
                            $c++;
                        }
                    }
                    $d = $a + $b + $c;
                    ?>
                    <div class="numbers" style="centre">{{ $a }}</div>

                    <div class="cardName">InProgress Task</div>
                </div>


            </div>

            <div  class="card" onclick="location.href='{{ route('TaskOnhold') }}'"
            style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers">{{ $b }}</div>
                    <div class="cardName">OnHold Task</div>
                </div>


            </div>

            <div  class="card" onclick="location.href='{{ route('TaskCompleted') }}'"
            style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers">{{ $c }}</div>
                    <div class="cardName">Completed Task</div>
                </div>


            </div>

            <div  class="card" onclick="location.href='{{ route('tasklist') }}'"
            style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers">{{ $d }}</div>
                    <div class="cardName">All Tasks</div>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Task List</h2>
                    <a href="{{ route('tasklist') }}" class="btn" style="margin-right: 16px;">View All</a>
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
                            <th>Status</th>

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


        </div>
    </body>

    </html>
    <script>
        /* Initialization of datatable */
        $(document).ready(function() {
            $('#tableID').details({});
        });
    </script>
@endsection
