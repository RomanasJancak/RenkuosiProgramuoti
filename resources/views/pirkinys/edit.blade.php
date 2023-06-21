@extends('layouts.app')
@section('content')
<div class="container">
   
    <h6><a href="{{route('pirkinys.show',[$pirkinys,$apsipirkimas,$budget,$user])}}">Back</a></h6>
    <form method="POST" action="{{route('pirkinys.update',[$apsipirkimas,$budget,$user])}}">
        <fieldset>
            <legend>Pirkinio redagavimo forma</legend>
            <p>
            <label for="prekepaslaugos">Pirkinio pavadinimas:</label>
            <!-- <input type="text" name="prekepaslauga_id" id="prekepaslauga_id"> -->
            <input list="prekepaslaugos" name="prekePaslauga" value="{{$pirkinys->prekepaslauga->id}}">
            <datalist id="prekepaslaugos">
                @foreach(App\Models\PrekePaslauga::all() as $prekepaslauga)
                    <option value="{{$prekepaslauga->id}}">{{$prekepaslauga->name.' '.$prekepaslauga->getroute()}}</option>
                @endforeach
            </datalist>            
            </p>
            <p>
            <label for="quantity">Kiekis :</label>
            <input type="text" name="quantity" id="quantity" value="{{$pirkinys->quantity}}">            
            </p>
            <p>
            <label for="price">Kaina :</label>
            <input type="text" name="price" id="price" value="{{$pirkinys->price}}">            
            </p>
            <p>
            <label for="deposit">Deposito dydis :</label>
            <input type="text" name="deposit" id="deposit" value="{{$pirkinys->deposit}}">            
            </p>
        <input type="hidden" name="user_id" value="$user">
        <input type="hidden" name="budget_id" value="$budget">
        <input type="hidden" name="apsipirkimas_id" value="$apsipirkimas">
        <input type="hidden" name="pirkinys_id" value="$pirkinys">
        @csrf
        <button type="submit">Pridėti</button>
        </fieldset>
    </form>
</div>
@endsection