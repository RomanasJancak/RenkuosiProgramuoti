@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="{{route('permission.store')}}">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Permission name">
            <button type="Submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection