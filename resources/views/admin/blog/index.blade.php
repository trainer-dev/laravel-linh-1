@extends('layouts.admin')

@section('content')
    <h3 class="h3">POSTS</h3>

    <table class="Rtable Rtable--7cols">
        <tr>
            <th class="Rtable-cell">ID</th>
            <th class="Rtable-cell">Name</th>
            <th class="Rtable-cell">Username</th>
            <th class="Rtable-cell">Description</th>
            <th class="Rtable-cell">Created At</th>
            <th class="Rtable-cell">Updated At</th>
            <th class="Rtable-cell">Detail</th>
            <th class="Rtable-cell">Delete</th>
        </tr>
        @foreach($model as $item)
            <tr>
                <td class="Rtable-cell">{{$item->id}}</td>
                <td class="Rtable-cell">{{$item->title}}</td>
                <td class="Rtable-cell">{{$item->username}}</td>
                <td class="Rtable-cell">{{str_limit($item->description, 20)}}</td>
                <td class="Rtable-cell">{{$item->created_at}}</td>
                <td class="Rtable-cell">{{$item->updated_at}}</td>
                <td class="center">
                    <form action="{{url("/admin/blog/$item->id")}}" method="get">
                        <input type="submit" class="btn btn-primary" value="Show">
                    </form>
                </td>
                <td class="center">
                    <form method="post" action="{{url("/admin/blog/delete/$item->id")}}">
                        @method('DELETE')
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <button class="btn btn-danger   " data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" onclick="alert('Complete!')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    <div class="pagination-sm" style="margin-left: 5rem">{{ $model->links()}}</div>

@endsection