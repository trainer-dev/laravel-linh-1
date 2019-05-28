@extends('layouts.admin')
@section('title')
    Admin Page
@endsection
@section('content')
    <h1 style="text-align: center">Admin Home Page</h1>

    <div class="flex-containers">
        <div>
            <a href="{{route('admin.blog')}}">{{$count}} Posts</a>
        </div>
        <div>
            <a href="{{route('admin.user')}}">{{ $user }} Users</a>
        </div>
    </div>
@endsection