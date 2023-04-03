@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{route('user.store')}}">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Users name">
            </div>
            <div class="form-group">    
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label> Roles</label><br>
                
                <select name="role" id="" class="form-select">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
                </select>
                
            </div>    
            <button type="submit" class="btn btn-primary">Create Role</button>
        </div>
    </form>
</div>


@endsection