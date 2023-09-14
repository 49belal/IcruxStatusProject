<html>

<head>
    @extends('layouts.app')



    @section('content')
        <style>
            .button {
                background-color: #138496;
                border: none;
                color: white;
                padding: 50px;
                height: 200px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 26px;
                margin: 40px 10px;
            }

            .button1 {
                background-color: #D2B48C;
                border: none;
                color: white;
                height: 200px;
                padding: 50px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 26px;
                margin: 40px 15px;

            }

            .button5 {
                border-radius: 60px;
            }

            .button:hover {
                opacity: 0.6
            }

            .button1:hover {
                opacity: 0.6
            }
        </style>
</head>

<body>
    <div>
        <button class="status inProgresss" style="margin-left:25px;margin-top:25px;" onclick="history.go(-1);">Back
        </button>
    </div>
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header" style="text-align: center;">{{ __('Super Admin Dashboard') }}</div>



                        <div class="card-body">


                            <a href="{{ route('ProjectList') }}"><button
                                    class="button button5">{{ __('List of the Projects') }}</button></a>
                            <a href="{{ route('CreateProject') }}"><button
                                    class="button1 button5">{{ __('Create New Project') }}</button></a>
                            <a href="{{ route('UserList') }}"><button
                                 type="button" class="btn btn-info btn-lg btn-block">{{ __('List of Users') }}</button></a>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    @endsection


</body>

</html>
