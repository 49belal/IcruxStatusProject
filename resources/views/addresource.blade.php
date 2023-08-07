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
                    <div class="card-header">{{ __('Add New Resource:') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('add.resource') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="project_key" class="col-md-4 col-form-label text-md-end">{{ __('Project Key') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $project_key ?>" name="project_key">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resource_name" class="col-md-4 col-form-label text-md-end">{{ __('Resource Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Resource Name" name="resource_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resource_email" class="col-md-4 col-form-label text-md-end">{{ __('Resource Email') }}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Resource Email" name="resource_email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Rating') }}</label>
                                <div class="col-md-6">
                                    <Select class="form-control" name="rating" placeholder="rating" id="rating">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </Select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_resource_date" class="col-md-4 col-form-label text-md-end">{{ __('Start Resource Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" placeholder="DD/MM/YYYY" name="start_resource_date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_resource_date" class="col-md-4 col-form-label text-md-end">{{ __('End Resource Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" placeholder="DD/MM/YYYY" name="end_resource_date">
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
