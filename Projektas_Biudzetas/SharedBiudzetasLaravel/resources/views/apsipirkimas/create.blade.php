@extends('layouts.app')
@section('content')
<div class="container">
    <h6><a href="{{route('budget.show',[$budget,$user])}}">Back</a></h6>
    <form method="POST" action="{{route('apsipirkimas.store',[$budget,$user])}}">
        <fieldset>
            <legend>Apsipirkimo sukūrimo forma</legend>
            <p>
            <label for="vendor_id">Apsipirkimo vietos pavadinimas:</label>
            <input list="vendors" name="vendor_id" id="vendor_id" >
            <datalist id="vendors">
                @foreach(App\Models\Vendor::all() as $vendor)
                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                @endforeach
            </datalist>             
            </p>
            <p>
            <label for="suma">Išleista suma centais :</label>
            <input type="text" name="suma" id="suma">            
            </p>
            <p>
            <label for="shop_time">Apsipirkimo data :</label>
            <input type="datetime-local" step="1" name="shop_time" id="shop_time">            
            </p>
        <input type="hidden" name="user_id" value="$user">
        <input type="hidden" name="budget_id" value="$budget">
        @csrf
        <button type="submit">Pridėti</button>
        </fieldset>
    </form>
</div>
@endsection