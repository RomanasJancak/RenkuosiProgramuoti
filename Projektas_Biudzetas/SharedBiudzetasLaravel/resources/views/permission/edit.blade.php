@extends('layouts.app')
@section('content')
<div class="container">
<form method="post"action="{{route('permission.update',$permission->id)}}">
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Permission name" value="{{$permission->name}}">
        <button type="submit" class="btn btn-primary">Edit

        </button>
    </div>
</form>
</div>
@endsection