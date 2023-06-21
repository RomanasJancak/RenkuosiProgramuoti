@extends('layouts.app')
@section('content')
<div class="container">
{{Breadcrumbs::render()}}
<form method="POST" action="{{route('budget.update',[$budget,$user])}}">
       Name <input type="text" name="budget_name" value="{{$budget->name}}">
       @csrf
       <button type="submit">EDIT</button>
</form>
</div>
@endsection