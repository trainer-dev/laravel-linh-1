@extends('layouts.admin')

@section('content')
    <h3 class="h3">POST</h3>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.blog.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$model->id}}">
                            <div class="form-group">
                                <label class="label">Post Title: </label>
                                <input type="text" name="title" class="form-control" value="{{$model->title}}"/>
                            </div>
                            <div class="form-group">
                                <label class="label">Post Body: </label>
                                <textarea name="body" rows="10" cols="30" class="form-control">{{$model->description}}</textarea>
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

    <script src="{{url('bower/tinymce/tinymce.min.js')}}"></script>

    <script>
        tinymce.init({
            selector: 'textarea[name=body]',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor save'
            ], //The plugins configuration option allows you to enable functionality within the editor.
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | save',
            save_enablewhendirty: true,
            height: 400,
        });

    </script>
@endsection

