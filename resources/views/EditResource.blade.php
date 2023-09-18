<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app2')
    @section('head')
        <title>Edit Task</title>
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
<body>
    <div>
        <button class="status inProgresss" style="margin-left:25px;margin-top:25px;" onclick="history.go(-1);">Back
        </button>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color:#7d7c70;color:white;">{{ __('Edit Task:') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update.resource') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="project_key" class="col-md-4 col-form-label text-md-end" hidden>{{ __('Project Key') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $project_key ?>" name="project_key" hidden >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resource_name" class="col-md-4 col-form-label text-md-end">{{ __('Resource Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $resource_name ?>"  name="resource_name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resource_email" class="col-md-4 col-form-label text-md-end">{{ __('Resource Email') }}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" value="<?php echo $resource_email ?>"  name="resource_email" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="task_description" class="col-md-4 col-form-label text-md-end">{{ __('Task Description') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $task_description ?>"  name="task_description" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_resource_date" class="col-md-4 col-form-label text-md-end">{{ __('Start Resource Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" required min="{{ Date('Y-m-d', strtotime('-15 days')) }}" value="<?php echo $start_resource_date ?>" name="start_resource_date" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_resource_date" class="col-md-4 col-form-label text-md-end">{{ __('End Resource Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" value="<?php echo $end_resource_date ?>" name="end_resource_date" required min="{{ Date('Y-m-d')}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                                <div class="col-md-6">
                                    <Select class="form-control" name="status" value="<?php echo $status ?>" id="status">
                                        <option>InProgress</option>
                                        <option>Completed</option>
                                        <option>OnHold</option>
                                    </Select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="remarks" class="col-md-4 col-form-label text-md-end">{{ __('Remarks') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Remarks" name="remarks">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="status inProgresss">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
