@extends('layouts.app')

@section('content')
    <h3 class="h3">BLOG</h3>
    <h5 class="h5">User can create, update, change posts here</h5>

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Login Successfully!</strong>
        </div>
    @endif

    @foreach($model as $item)
        <div class="container">
            <form method="post" action="{{route('user.show')}}">
                {{ csrf_field() }}
                <input type="hidden" name="userID" value="{{Auth::user()->isAdmin}}">
                <input type="hidden" name="postID" value="{{$item->id}}">
                <h3>
                    <i class="fas fa-user"></i>
                    <input type="submit" value="{{$item->username}}" name="submit" class="submit"></h3>

            </form>

            <i class="far fa-calendar-alt"></i> {{$item->created_at}} &nbsp &nbsp &nbsp &nbsp &nbsp
            <i class="fas fa-edit"></i> {{$item->updated_at}}

            {!! str_limit($item->description, 200) !!}

            <form action="{{url("/blog/$item->id")}}" method="get">
                <input type="submit" class="link" name="submit" value="Read more...">
            </form>
        </div>

    @endforeach

@endsection
