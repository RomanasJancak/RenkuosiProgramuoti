@extends('layouts.app')
@section('content')
<div class="container">
    <h6><a href="{{route('user.show',[$user])}}">Back</a></h6>
    <form method="POST" action="{{route('budget.store',$user)}}">
        <fieldset>
            <legend>Biudžeto sukurimo forma</legend>
            <p>
            <label for="budget_name_id">Biudžeto pavadinimas :</label>
            <input type="text" name="budget_name" id="budget_name_id" placeholder="Pagrindinis biudžetas">            
            </p>
        <input type="hidden" name="user_id" value="$user">
        @csrf
        <button type="submit">Pridėti</button>
        </fieldset>
    </form>
</div>
@endsection