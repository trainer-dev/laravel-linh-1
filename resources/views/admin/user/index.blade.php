@extends('layouts.admin')

@section('content')
    <h3 class="h3">USERS</h3>
    <h5 class="h5"></h5>

    <div class="flex-container">
        <div><a href="{{url("admin/user/create")}}">Create User</a> </div>
        <div><a href="{{url('admin/user/restore')}}">Restore User</a></div>
        <div><a href="{{url('admin/user')}}">User</a></div>
    </div>
    <table class="Rtable Rtable--7cols">
        <tr>
            <th class="Rtable-cell">ID</th>
            <th class="Rtable-cell">Username</th>
            <th class="Rtable-cell">Email</th>
            <th class="Rtable-cell">Created At</th>
            <th class="Rtable-cell">Updated At</th>
            <th class="Rtable-cell">Is Admin</th>
            <th class="Rtable-cell">Profile</th>
            <th class="Rtable-cell">Delete</th>

        </tr>
        @foreach($model as $item)
            <tr>
                <td class="Rtable-cell">{{$item->id}}</td>
                <td class="Rtable-cell">{{$item->name}}</td>
                <td class="Rtable-cell">{{$item->email}}</td>
                <td class="Rtable-cell">{{$item->created_at}}</td>
                <td class="Rtable-cell">{{$item->updated_at}}</td>
                <td class="Rtable-cell">{{$item->is_admin}}</td>
                <td class="center">
                    <form action="{{url("admin/user/profile/$item->id")}}" method="get">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </form>
                </td>
                <td class="center">
                    <form method="post" action="{{url("admin/user/delete/$item->id")}}">
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