@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('permission.create')}}" class="btn btn-primary">Create</a>
    <table  class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Guard Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->guard_name}}</td>
                <td>
                    @can('permission-delete')
                    <form method="POST" action="{{route('permission.destroy',$permission->id)}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endcan
                    @can('permission-edit')
                    <a href="{{route('permission.edit', $permission->id)}}" class="btn btn-secondary">Edit</a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection