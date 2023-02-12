@extends('layouts.app')
@section('content')
<?php $auth_useris = ($budget->users->where('id',auth()->user()->id)->first());
      $auth_useris_role = App\Models\Role::find($auth_useris->pivot->role_id);
      $auth_useris_role = App\Models\Role::find($budget->users->where('id',auth()->user()->id)->first()->pivot->role_id);
?>
<div class="container">
    <div>
    <h6><a href="{{route('user.show',[$user])}}">Back</a></h6>        
    </div>    
    <table class="table table-striped caption-top">
        <caption>Biudžetas</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>User count</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>
            <td>{{$budget->id}}</td>
            <td>{{$budget->name}}</td>
            <td>{{$budget->created_at}}</td>
            <td>{{$budget->updated_at}}</td>
            <td>{{$budget->users->count()}}</td>
            {{--dd(auth()->user()->permissions)--}}


            @if(($auth_useris_role->id == '4')||($auth_useris_role->id == '5'))
            <td><a href="{{route('budget.edit',[$budget,$user])}}">Edit</a></td>
            @endif
            @if($auth_useris_role->id == '4')
            <td><a href="{{route('budget.destroy',[$budget,$user])}}">Delete budget</a></td>
            @endif
        </tr>
    </table>
    <!--  -->
    <table class="table table-striped caption-top">
        <caption>Users</caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($budget->users as $useris)             
            <tr>
                <td>{{$useris->id}}</td>
                <td>{{$useris->name}}</td>
                <td>{{App\Models\Role::find($useris->pivot->role_id)->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--  -->
    @include('apsipirkimas.index', ['apsipirkimai' => $budget->apsipirkimai])
</div>
@endsection