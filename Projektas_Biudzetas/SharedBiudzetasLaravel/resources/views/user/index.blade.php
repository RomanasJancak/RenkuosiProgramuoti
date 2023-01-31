@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped">
  <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Roles</th>
  <th>Show</th>
  </tr>
@foreach ($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>
      
      @foreach($user->getRoleNames() as $rolename)
        {{$rolename.' , '}}
      @endforeach
    </td>
    <td><a href="{{route('user.show',$user)}}">More...</a></td>
  </tr>
@endforeach
</table>
</div>
@endsection