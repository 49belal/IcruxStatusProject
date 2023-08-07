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
                    <div class="card-header">{{ __('Create New Project:') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('new.project') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="client_name" class="col-md-4 col-form-label text-md-end">{{ __('Client Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Client Name" name="client_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="project_lead" class="col-md-4 col-form-label text-md-end">{{ __('Project Lead') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Project Lead" name="project_lead">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Priority') }}</label>
                                <div class="col-md-6">
                                    <Select class="form-control" name="priority" id="priority">
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                    </Select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" placeholder="DD/MM/YYYY" name="start_date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_date" class="col-md-4 col-form-label text-md-end">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" placeholder="DD/MM/YYYY" name="end_date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Description" name="description">
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
