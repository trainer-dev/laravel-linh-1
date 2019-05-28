@extends('layouts.admin')

@section('content')
    <h3 class="h3">USERS</h3>
    <h5 class="h5"></h5>

    <div class="flex-container">
        <div><a href="{{url("admin/user/create")}}">Create User</a> </div>
        <div><a href="{{url('admin/user/restore')}}">Restore User</a></div>
        <div><a href="{{url('admin/user')}}">User</a></div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Change user's profile</div>

                    <div class="card-body">
                        <form action="{{ route('admin.user.update') }}" method="POST" >
                            @csrf

                            <input type="hidden" name="id" value="{{$model->id}}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$model->name }}"      autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$model->email }}" >

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="formName">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Change password</div>
                        <div class="card-body">
                            <form action="{{ route('admin.user.change') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$model->id}}">

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    @if(!empty($mess))
                                        <div class="alert alert-success"> {{ $successMsg }}</div>
                                    @endif

                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" name="formPassword">
                                            Change
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Change password</div>
                    <div class="card-body">
                        <form action="{{ url("admin/user/role") }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$model->id}}">

                            <div class="form-group row">
                                <label for="Admin" class="col-md-4 col-form-label text-md-right">Admin</label>

                                <div class="col-md-6">
                                    <input id="admin" type="text" class="form-control" name="admin" value="{{$model->is_admin }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="formAdmin">
                                        Change
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection