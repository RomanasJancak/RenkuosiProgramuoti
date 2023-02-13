@extends('layouts.app')

@section('content')
<?php 
$permissions = Spatie\Permission\Models\Permission::all();
?>
<div class="container">
    <form method="post" action="{{route('role.update', $role->id)}}">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Roles name" value='{{$role->name}}'>
            </div>
            <div class="form-group">
                <label> Persimission</label><br>
                @foreach ($permissions as $permission)
                    <label>
                        @if ($permission->roles->contains($role->id))
                            <input type="checkbox" name="permissions[]" value="{{$permission->id}}" checked> 
                        @else    
                            <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                        @endif
                        {{$permission->name}}
                    </label><br>
                @endforeach
            </div>    
            <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
    </form>
</div>


@endsection