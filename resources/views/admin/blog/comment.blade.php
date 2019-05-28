@extends('layouts.admin')

@section('content')
    <h3 class="h3" >BLOG</h3>
    <h5 class="h5">User can create, update, change post here</h5>

    <div class="container">
        <ul class="dropdown-menu-right">
            <li>
                <p class="title"><strong>Title: </strong>{{$model->title}}</p>
            </li>
            <li class="right">
                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-content">
                        <form action="{{url("/admin/blog/posts/$model->id")}}" method="get">
                            <input type="submit" class="form dropdown-btn" value="Edit">
                        </form>
                        <form method="post" action="{{url("/admin/blog/delete/$model->id")}}}">
                            @method('DELETE')
                            @csrf
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <button class="form dropdown-btn" data-id="{{ $model->id }}" data-token="{{ csrf_token() }}" onclick="alert('Complete!')">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
        <hr>
        <form method="post" action="{{route('user.show')}}">
            {{ csrf_field() }}
            <h3>
                <i class="fas fa-user"></i>
                <input type="submit" value="{{$model->username}}" name="submit" class="submit"></h3>
        </form>
        <i class="far fa-calendar-alt"></i> {{$model->updated_at}}

        <p>{{$model->description, 200}}</p>
    </div>

    @foreach($model->comments as $comment)
        <div class="container">
            <ul>
                <li>
                    <form method="post" action="{{route('user.show')}}">
                        {{ csrf_field() }}
                        <h3>
                            <i class="far fa-user"></i>
                            <input type="submit" value="{{$comment->user->name }}" name="submit" class="submit">
                        </h3>
                    </form>
                </li>
                <li class="right">
                    <div class="dropdown">
                        <button class="dropbtn">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-content">
                            <form action="{{url("admin/blog/comment/$comment->id")}}" method="get">
                                @csrf
                                <input type="submit" class="form dropdown-btn" value="Edit">
                            </form>

                            <form method="post" action="{{url("admin/blog/comment/delete/$comment->id")}}}" name="delete">
                                @method('DELETE')
                                @csrf
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <button class="form dropdown-btn" data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}" onclick="alert('Complete!')">Delete</button>
                            </form>

                        </div>
                    </div>
                </li>
            </ul>

            <i class="far fa-calendar-alt"></i> {{$comment->updated_at}}

            {!! $comment->comment !!}
        </div>
    @endforeach

@endsection
