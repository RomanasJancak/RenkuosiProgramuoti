@extends('layouts.app')
@section('content')
<div class="container">
{{Breadcrumbs::render()}}
<?php $user = auth()->user();?>
<table class="table table-striped caption-top" style="overflow-x:auto;">
    <caption>Biudžetai</caption>
    <tr>
        
        <th>ID</th>
        <th>Name</th>
        <th>User count</th>
        <th>Apsipirkimų kiekis</th>
        <th colspan="3">Actions<th>
    </tr>
    @foreach ($budgets as $budget)
    <tr>
        <td>{{$budget->id}}</td>
        <td>{{$budget->name}}</td>
        <td>{{$budget->users->count()}}</td>
        <td>{{$budget->apsipirkimai->count()}}</td>
        <td><a href="{{route('budget.show',[$budget,$user])}}">More...</a></td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4" style="text-align : center">
            <a href="{{route('budget.create',$user)}}">Add Budget</a>            
        </td>
    </tr>
</table>
</div>
@endsection