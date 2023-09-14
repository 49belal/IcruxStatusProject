<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app2')
    @section('head')
        <title>Feedback</title>
        <!-- ======= Styles ====== -->
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @endsection
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

@section('menu')
    <title>Feedback Form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1 {
            font-weight: 400;
        }

        h4 {
            margin: 15px 0 4px;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 3px;
        }

        form {
            width: 100%;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px #ccc;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            vertical-align: middle;
        }

        .email {
            display: block;
            width: 45%;
        }

        input:hover,
        textarea:hover {
            outline: none;
            border: 1px solid #095484;
        }

        th,
        td {
            width: 15%;
            padding: 15px 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
            vertical-align: unset;
            line-height: 18px;
            font-weight: 400;
            word-break: break-all;
        }

        .first-col {
            width: 16%;
            text-align: left;
        }

        table {
            width: 100%;
        }

        textarea {
            width: calc(100% - 6px);
        }

        .btn-block {
            margin-top: 20px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #095484;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0666a3;
        }

        @media (min-width: 568px) {

            th,
            td {
                word-break: keep-all;
            }
        }
    </style>

    <body>
        <div>
            <button class="status inProgresss" style="margin-left:25px;margin-top:25px;" onclick="history.go(-1);">Back
            </button>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color:#7d7c70;color:white;">{{ __('Feedback Form:') }}</div>

                        <div class="card-body">
                            <div class="testbox">
                                <form method="POST" action="{{ route('task.feedback') }}">
                                    @csrf
                                    <input type="hidden" class="form-control" name="resource_key"
                                        value="{{ $resourcekey }}">
                                    <h3>Overall experience with our task</h3>
                                    <table>
                                        <tr>
                                            <th class="first-col"></th>
                                            <th>Very Good</th>
                                            <th>Good</th>
                                            <th>Fair</th>
                                            <th>Poor</th>
                                            <th>Very Poor</th>
                                        </tr>
                                        <tr>
                                            <td class="first-col">How would you rate your overall experience with
                                                task?</td>
                                            <td><input type="radio" value="Very Good" name="overall_experince" /></td>
                                            <td><input type="radio" value="Good" name="overall_experince" /></td>
                                            <td><input type="radio" value="Fair" name="overall_experince" /></td>
                                            <td><input type="radio" value="Poor" name="overall_experince" /></td>
                                            <td><input type="radio" value="Very Poor" name="overall_experince" /></td>
                                        </tr>
                                        <tr>
                                            <td class="first-col">How satisfied are you with the completeness of
                                                task?</td>
                                            <td><input type="radio" value="Very Good" name="completeness" /></td>
                                            <td><input type="radio" value="Good" name="completeness" /></td>
                                            <td><input type="radio" value="Fair" name="completeness" /></td>
                                            <td><input type="radio" value="Poor" name="completeness" /></td>
                                            <td><input type="radio" value="Very Poor" name="completeness" /></td>
                                        </tr>
                                        <tr>
                                            <td class="first-col">How would you rate for logic?</td>
                                            <td><input type="radio" value="Very Good" name="logic" /></td>
                                            <td><input type="radio" value="Good" name="logic" /></td>
                                            <td><input type="radio" value="Fair" name="logic" /></td>
                                            <td><input type="radio" value="Poor" name="logic" /></td>
                                            <td><input type="radio" value="Very Poor" name="logic" /></td>
                                        </tr>
                                        <tr>
                                            <td class="first-col">How satisfied are you with the timeliness of task?</td>
                                            <td><input type="radio" value="Very Good" name="time" /></td>
                                            <td><input type="radio" value="Good" name="time" /></td>
                                            <td><input type="radio" value="Fair" name="time" /></td>
                                            <td><input type="radio" value="Poor" name="time" /></td>
                                            <td><input type="radio" value="Very Poor" name="time" /></td>
                                            {{-- </tr>
                                        <tr>
                                            <td class="first-col">How satisfied are you with the customer support?</td>
                                            <td><input type="radio" value="none" name="name" /></td>
                                            <td><input type="radio" value="none" name="name" /></td>
                                            <td><input type="radio" value="none" name="name" /></td>
                                            <td><input type="radio" value="none" name="name" /></td>
                                            <td><input type="radio" value="none" name="name" /></td>
                                        </tr>
                                        <tr>
                                            <td class="first-col">Would you recommend our product / service to other people?
                                            </td>
                                            <td><input type="radio" value="none" name="recommend" /></td>
                                            <td><input type="radio" value="none" name="recommend" /></td>
                                            <td><input type="radio" value="none" name="recommend" /></td>
                                            <td><input type="radio" value="none" name="recommend" /></td>
                                            <td><input type="radio" value="none" name="recommend" /></td>
                                        </tr> --}}
                                    </table>
                                    <h4>What should to change in order to live up to your expectations?</h4>
                                    <textarea rows="5" required></textarea>
                                    <div class="btn-block">
                                        <button type="submit">Submit Feedback</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
