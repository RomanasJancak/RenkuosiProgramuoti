@extends('layouts.app')
@section('content')
<div class="container">
<div>
        <h6><a href="{{route('apsipirkimas.show',[$apsipirkimas,$budget,$user])}}">Back</a></h6>     
    </div> 

<form method="POST" action="{{route('apsipirkimas.update',[$apsipirkimas,$budget,$user])}}">
       <fieldset>
            <legend>Apsipirkimo redagavimo forma</legend>
            <p>
            <label for="shop_id">Apsipirkimo vietos pavadinimas [temp ID]:</label>
            <input type="text" name="shop_id" id="shop_id" value="{{$apsipirkimas->shop_id}}">            
            </p>
            <p>
            <label for="suma">Išleista suma centais :</label>
            <input type="text" name="suma" id="suma" value="{{$apsipirkimas->suma}}">            
            </p>
            <p>
            <label for="shop_time">Apsipirkimo data :</label>
            <input type="datetime-local" step="1" name="shop_time" id="shop_time" value="{{$apsipirkimas->shop_time}}">            
            </p>
        <input type="hidden" name="user_id" value="$user">
        <input type="hidden" name="budget_id" value="$budget">
        @csrf
        <button type="submit">Patvirtinti</button>
        </fieldset>
</form>
</div>
@endsection