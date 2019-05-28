@extends('layouts.app')

@section('content')
    <h3 class="h3">BLOG</h3>
    <h5 class="h5">User can create, update, change post here</h5>

    <div class="container">
        <p class="title"><strong>Title: </strong>{{$model->title}}</p>
        <hr>
        <form method="post" action="{{route('user.show')}}">
            {{ csrf_field() }}
            <h3>
                <i class="fas fa-user"></i>
                <input type="submit" value="{{$model->username}}" name="submit" class="submit"></h3>
        </form>
        <i class="far fa-calendar-alt"></i> {{$model->updated_at}}

        {!! $model->description !!}
    </div>

    @foreach($model->comments as $comment)
        <div class="container">
            <form method="post" action="{{route('user.show')}}">
                {{ csrf_field() }}
                <h3>
                    <i class="far fa-user"></i>
                    <input type="submit" value="{{$comment->user->name}}" name="submit" class="submit">
                </h3>
            </form>
            <i class="far fa-calendar-alt"></i> {{$comment->updated_at}}

            {!! $comment->comment  !!}
        </div>
    @endforeach

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Add comment</h5>
                        <form method="post" action="{{ route('comment.add') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="comment" id="body" maxlength="250" >
                                </textarea>

                                <input type="hidden" name="post_id" value="{{ $model->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('bower/tinymce/tinymce.min.js')}}"></script>

    <script>
        tinymce.init({
            selector: 'textarea[name=comment]',
            height: 500,
            plugins: "image code",
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            images_upload_base_path: '/p/basepath',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();ublic

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        });

    </script>
@endsection


