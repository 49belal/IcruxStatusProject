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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    @endsection
</head>
@section('menu')
    <style>
        .parent {

            /* margin: 1rem; */
            padding: 1rem 1rem;
            text-align: center;
        }

        .child {
            display: inline-block;

            padding: 1rem 1rem;
            /* vertical-align: middle; */
        }

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
            margin-left: 13px;
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

    <body>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">

            <div class="card" onclick="location.href='{{ route('ProjectStatus', 'Completed') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <?php
                    $a = 0;
                    $b = 0;
                    $c = 0;
                    foreach ($ProjectList as $ProjectList_a) {
                        if ($ProjectList_a->project_status == 'InProgress') {
                            $a++;
                        } elseif ($ProjectList_a->project_status == 'OnHold') {
                            $b++;
                        } else {
                            $c++;
                        }
                    }
                    $d = $a + $b + $c;
                    ?>
                    <div class="numbers" style="centre">{{ $a }}</div>

                    <div class="cardName">InProgress Projects</div>
                </div>


            </div>

            <div class="card" onclick="location.href='{{ route('ProjectStatus', 'OnHold') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers" style="centre">{{ $b }}</div>
                    <div class="cardName">OnHold Projects</div>
                </div>


            </div>

            <div class="card" onclick="location.href='{{ route('ProjectStatus', 'InProgress') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers" style="centre">{{ $c }}</div>
                    <div class="cardName">Completed Projects</div>
                </div>


            </div>

            <div class="card" onclick="location.href='{{ route('ProjectList') }}'"
                style="text-align: center;cursor:pointer;">
                <div>
                    <div class="numbers" style="centre">{{ $d }}</div>
                    <div class="cardName">All Projects</div>
                </div>


            </div>
        </div>

        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="parent">

                    <div class="child">

                        <canvas id="myChart" style="width:200%;max-width:350px"></canvas>

                    </div>
                    <div class="child">

                        <canvas id="myChart1" style="width:350%;max-width:600px;margin-left:55px"></canvas>

                    </div>
                </div>

            </div>
        </div>

        {{-- <!-- =========== Scripts =========  -->
        <script src="js/main.js"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> --}}
    </body>

    </html>

    <script>
        var values = {
            InProgress: "{{ $a }}",
            OnHold: "{{ $b }}",
            Completed: "{{ $c }}",


        }
        var xValues = ["InProgress", "OnHold", "Completed"];
        var yValues = [values.InProgress, values.OnHold, values.Completed];
        var barColors = [
            "#ADD8E6",
            "#FFEFD5",
            "#D3D3D3",

        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,

                }
            }
        });
    </script>
    <script>
         var values = {
            January: {{ $january[0]->january}},
            February: {{ $february[0]->february }},
            March: {{ $march[0]->march }},
            April: {{ $april[0]->april }},
            May: {{ $may[0]->may }},
            June: {{ $june[0]->june }},
            July: {{ $july[0]->july }},
            August: {{ $august[0]->august }},
            September: {{ $september[0]->september }},
            October: {{ $october[0]->october }},
            November: {{ $november[0]->november }},
            December: {{ $december[0]->december }}


        }
        var xValues = ["January", "February", "March", "April", "May","June", "July", "August", "September", "October","November", "December"];
        var yValues = [values.January, values.February, values.March, values.April, values.May,values.June, values.July, values.August, values.September, values.October,values.November, values.December];
        var barColors = ["#D3D3D3", "#FAFAD2", "#F08080", "#ADD8E6", "#F5F5DC","#FFA07A", "#808080", "#87CEFA", "#66CDAA", "#FA8072","#C0C0C0", "#FFDEAD"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Number of Projects in 2023"
                }
            }
        });
    </script>
@endsection
