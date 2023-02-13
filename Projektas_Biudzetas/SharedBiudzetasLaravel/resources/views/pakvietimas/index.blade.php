@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped caption-top">
<caption style="text-align:center">Received Invitations</caption>
  <tr>
  <th>ID</th>
  <th>Invitation date</th>
  <th>To be shared</th>
  <th>Name of shared object</th>
  <th>Who is sharing - Email</th>
  <th>Invitation role</th>
  <th colspan="2">Actions</th>
  </tr>
@foreach ($pakvietimai as $pakvietimas)
  <tr>
    <td>{{$pakvietimas->id}}</td>
    <td>{{$pakvietimas->created_at}}</td>
    <td>{{$pakvietimas->model_type_what}}</td>
    <td>{{call_user_func( array( $pakvietimas->model_type_what, 'all' ) )->where('id',$pakvietimas->model_id_what)->first()->name }}
    <td>{{App\Models\User::find($pakvietimas->model_id_who)->email}}</td>
    <td>{{App\Models\Role::find($pakvietimas->role_id)->name}}</td>
    <td>
      <form method="post"
        @if($pakvietimas->model_type_what === 'App\Models\Budget') 
        action="{{route('budget.update',[call_user_func( array( $pakvietimas->model_type_what, 'all' ) )->where('id',$pakvietimas->model_id_what)->first(),auth()->user()])}}">
        <!-- <input type="hidden" name="pakvietimas_id" value="$pakvietimas"> -->
        <input type="text" hidden name="pakvietimas_id" value="{{$pakvietimas->id}}">
        <input type="text" hidden name="role_id" value="{{$pakvietimas->role_id}}">
        @else
        action="">
        
        @endif
         
                  
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Accept</button>
                  </form></td>
    <td>                  <form method="post" action="{{route('pakvietimas.destroy',[$pakvietimas])}}">                   
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Decline</button>
                  </form></td>
  </tr>
@endforeach
</table>
<?php
        $pakvietimaiAll = App\Models\Pakvietimas::all();
        $pakvietimai_sent = collect();
        foreach($pakvietimaiAll as $pakvietimas){
            if(get_class(auth()->user()) === $pakvietimas->model_type_who){
                if(auth()->user()->id === $pakvietimas->model_id_who){
                    $pakvietimai_sent->push($pakvietimas);
                }
            }            
            
        } 
?>

  <table class="table table-striped caption-top">
    <caption style="text-align:center">Sent Invitations</caption>
    <tr>
      <th>ID</th>
      <th>Invitation date</th>
      <th>What type</th>
      <th>What name</th>
      <th>To whom type  </th>
      <th>To whom email</th>
      <th>Invitation role</th>
      <th colspan="2">Actions</th>
    </tr>
    @foreach ($pakvietimai_sent as $pakvietimas)
    <tr>
      <td>{{$pakvietimas->id}}</td>
      <td>{{$pakvietimas->created_at}}</td>
      <td>{{$pakvietimas->model_type_what}}</td>
      <td>{{call_user_func( array( $pakvietimas->model_type_what, 'all' ) )->where('id',$pakvietimas->model_id_what)->first()->name}}</td>
      <td>{{$pakvietimas->model_type_with}}</td>
      <td>{{call_user_func( array( $pakvietimas->model_type_with, 'all' ) )->where('id',$pakvietimas->model_id_with)->first()->email}}</td>
      <td>{{App\Models\Role::find($pakvietimas->role_id)->name}}</td>
      <td>
        <form method="post" action="{{route('pakvietimas.destroy',[$pakvietimas])}}">                   
          @csrf<button type="submit" class="btn btn-primary px-0 py-0">Cancel</button>
        </form>
      </td>       
    </tr>
    @endforeach
  </table>
</div>
@endsection