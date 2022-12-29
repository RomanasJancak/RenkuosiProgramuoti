@extends('layouts.app')
@section('content')
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
            <td><a href="{{route('budget.edit',[$budget,$user])}}">Edit</a></td>
            <td><a href="{{route('budget.destroy',[$budget,$user])}}">Delete account</a></td>
        </tr>
    </table>
    @include('apsipirkimas.index', ['apsipirkimai' => $budget->apsipirkimai])
</div>
@endsection