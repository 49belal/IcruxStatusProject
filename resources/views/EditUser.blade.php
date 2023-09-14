<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app2')
    @section('head')
        <title>Edit User</title>
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
                    <div class="card-header" style="background-color:#7d7c70;color:white;">{{ __('Edit User:') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('edit.user') }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $name ?>" name="user_name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="user_email" class="col-md-4 col-form-label text-md-end">{{ __('User Email') }}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" value="<?php echo $email ?>" name="user_email" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <Select class="form-control" name="role" id="role">
                                        <?php
                                            if($type==0){ ?>
                                                <option selected>User</option>
                                                <option>Admin</option>
                                                <option>Team Lead</option>
                                                <option>Super Admin</option>
                                        <?php }elseif($type==1){ ?>
                                            <option>User</option>
                                            <option selected>Admin</option>
                                            <option>Team Lead</option>
                                            <option>Super Admin</option>
                                        <?php }elseif($type==2){ ?>
                                            <option>User</option>
                                            <option>Admin</option>
                                            <option>Team Lead</option>
                                            <option selected>Super Admin</option>
                                        <?php }elseif($type==3){ ?>
                                        <option>User</option>
                                        <option>Admin</option>
                                        <option selected>Team Lead</option>
                                        <option>Super Admin</option>
                                        <?php } ?>

                                    </Select>
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
