@extends('layouts.app')

@section('content')
    <h3 class="h3">POST</h3>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/post/update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$model->id}}">
                            <div class="form-group">
                                <label class="label">Post Title: </label>
                                <input type="text" name="name" class="form-control" value="{{$model->title}}"/>
                            </div>
                            <div class="form-group">
                                <label class="label">Post Body: </label>
                                <textarea name="description" rows="10" cols="30" class="form-control">{{$model->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



