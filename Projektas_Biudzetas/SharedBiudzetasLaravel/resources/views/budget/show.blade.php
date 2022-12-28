@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <h6><a href="{{route('user.show',$user)}}">Back</a></h6>
    </div>    
    <table class="table table-striped caption-top">
        <caption>Biudžetas</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>User count</th>
        </tr>
        <tr>
            <td>{{$budget->id}}</td>
            <td>{{$budget->name}}</td>
            <td>{{$budget->created_at}}</td>
            <td>{{$budget->updated_at}}</td>
            <td>{{$budget->users->count()}}</td>
        </tr>
    </table>
    @include('apsipirkimas.index', ['apsipirkimai' => $budget->apsipirkimai])
</div>
@endsection