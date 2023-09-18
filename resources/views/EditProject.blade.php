<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app2')
    @section('head')
        <title>Edit Project</title>
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
                    <div class="card-header" style="background-color:#7d7c70;color:white;">{{ __('Edit Project:') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('updateproject') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="project_key" class="col-md-4 col-form-label text-md-end" hidden>{{ __('Project Key') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $project_key ?>" name="project_key" hidden >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="client_name" class="col-md-4 col-form-label text-md-end">{{ __('Client Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $client_name ?>" name="client_name" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="project_lead" class="col-md-4 col-form-label text-md-end">{{ __('Project Lead') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $project_lead ?>" name="project_lead" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('ProjectStatus') }}</label>
                                <div class="col-md-6">
                                    <Select class="form-control" name="project_status" value="<?php echo $project_status ?>" id="project_status">

                                        <?php
                                        if($project_status=="InProgress"){ ?>
                                            <option selected>InProgress</option>
                                            <option>Completed</option>
                                            <option>OnHold</option>
                                    <?php }elseif($project_status=="Completed"){ ?>
                                        <option>InProgress</option>
                                        <option selected>Completed</option>
                                        <option>OnHold</option>
                                    <?php }elseif($project_status=="OnHold"){ ?>
                                        <option>InProgress</option>
                                        <option>Completed</option>
                                        <option selected>OnHold</option>
                                    <?php } ?>
                                    </Select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Priority') }}</label>
                                <div class="col-md-6">
                                    <Select class="form-control" name="priority" value="<?php echo $priority ?>" id="priority">

                                        <?php
                                        if($priority=="Low"){ ?>
                                             <option selected>Low</option>
                                             <option>Medium</option>
                                             <option>High</option>
                                    <?php }elseif($priority=="Medium"){ ?>
                                        <option>Low</option>
                                        <option selected>Medium</option>
                                        <option>High</option>
                                    <?php }elseif($priority=="High"){ ?>
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option selected>High</option>
                                    <?php } ?>
                                    </Select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control"value="<?php echo $start_date ?>" name="start_date" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_date" class="col-md-4 col-form-label text-md-end">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" value="<?php echo $end_date ?>" name="end_date"  required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $description ?>" name="description" required>
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
