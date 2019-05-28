@extends('layouts.app')

@section('content')
    <h3 class="h3">POST CONTROLLER</h3>
    <h5 class="h5">User can create, update, change post here</h5>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post.store') }}">
                            @csrf
                            <input type="hidden" name="username" value="{{Auth::user()->name}}">
                            <div class="form-group">
                                <label class="label">Post Title: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Post Body: </label>
                                <textarea class="form-control" name="body" id="content" maxlength="250" pattern="[a-z]{1,15}" ></textarea>

                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" />
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

