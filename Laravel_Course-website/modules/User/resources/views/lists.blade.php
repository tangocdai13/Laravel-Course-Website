@extends('layouts.backend')
@section('content')
    @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}")
        </script>
    @endif
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Group</th>
                <th scope="col">Time</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        @if($lists->count() > 0)
            @foreach($lists as $list)
            <tr>
                <th scope="row">{{ $list->id }}</th>
                <td>{{ $list->name }}</td>
                <td>{{ $list->email }}</td>
                <td>{{ $list->group_id }}</td>
                <td>{{ $list->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        @else
            <th colspan="7">Không có bảng ghi nào</th>
        @endif
        </tbody>
    </table>
@endsection
