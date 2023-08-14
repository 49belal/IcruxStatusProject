<html>
<head>
    @extends('layouts.app')
    @section('content')
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New User:') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('add.newuser') }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="User Name" name="user_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="user_email" class="col-md-4 col-form-label text-md-end">{{ __('User Email') }}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="User Email" name="user_email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <Select class="form-control" name="role" placeholder="role" id="role">
                                        <option>User</option>
                                        <option>Admin</option>
                                        <option>Team Lead</option>
                                        <option>Super Admin</option>
                                    </Select>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
