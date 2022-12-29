@extends('layouts.app')
@section('content')
<div class="container">
<div>
        <h6><a href="{{route('budget.show',[$budget,$user])}}">Back</a></h6>     
    </div> 

<form method="POST" action="{{route('budget.update',[$budget,$user])}}">
       Name <input type="text" name="budget_name" value="{{$budget->name}}">
</select>
       @csrf
       <button type="submit">EDIT</button>
</form>
</div>
@endsection