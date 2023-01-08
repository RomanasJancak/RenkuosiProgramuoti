@extends('layouts.app')
@section('content')
<div class="container">
    <h6><a href="{{route('apsipirkimas.show',[$apsipirkimas,$budget,$user])}}">Back</a></h6>
    <form method="POST" action="{{route('pirkinys.store',[$apsipirkimas,$budget,$user])}}">
        <fieldset>
            <legend>Pirkinio sukūrimo forma</legend>
            <p>
            <label for="prekepaslauga_id">Pirkinio pavadinimas [temp ID] :</label>
            <input type="text" name="prekepaslauga_id" id="prekepaslauga_id">            
            </p>
            <p>
            <label for="quantity">Kiekis :</label>
            <input type="text" name="quantity" id="quantity">            
            </p>
            <p>
            <label for="price">Kaina :</label>
            <input type="text" name="price" id="price">            
            </p>
            <p>
            <label for="deposit">Deposito dydis :</label>
            <input type="text" name="deposit" id="deposit">            
            </p>
        <input type="hidden" name="user_id" value="$user">
        <input type="hidden" name="budget_id" value="$budget">
        <input type="hidden" name="apsipirkimas_id" value="$apsipirkimas">
        @csrf
        <button type="submit">Pridėti</button>
        </fieldset>
    </form>
</div>
@endsection