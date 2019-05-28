@extends('layouts.app')

@section('content')
    <h3 class="h3">BLOG</h3>
    <h5 class="h5">User can create, update, change post here</h5>

    @if(!empty($wrongMsg))
        <div class="col-md-8" style="margin: auto; text-align: center">
            <div class="alert alert-danger"> {{ $wrongMsg }}</div>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Change password</div>
                    <div class="card-body">
                        <form action="{{ route('user.setting.store') }}" method="get">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{Auth::user()->id}}">

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
@endsection