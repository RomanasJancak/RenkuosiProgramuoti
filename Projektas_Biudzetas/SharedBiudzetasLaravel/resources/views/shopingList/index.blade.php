@extends('layouts.app')

@section('content')
<div class="container">
    @can('role-create')
        <a href="{{route('role.create')}}" class="btn btn-primary">Create</a>
    @endcan
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @can('role-delete')
                        <form action="{{route('role.destroy', $role->id)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    @endcan    
                   

                    @can('role-edit')
                        {{$role->id}}
                        <a href="{{route('role.edit', [$role->id])}}" class="btn btn-secondary">Edit</a>
                    @endcan    
                    <a href="{{route('role.show', $role->id)}}" class="btn btn-success">Show</a>


                </td>
            </tr>
        @endforeach

    </table>
</div>


@endsection