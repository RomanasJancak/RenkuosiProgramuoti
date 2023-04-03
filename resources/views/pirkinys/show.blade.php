@extends('layouts.app')
@section('content')
<?php
$auth_useris_role = App\Models\Role::find($budget->users->where('id',auth()->user()->id)->first()->pivot->role_id);
?>
<div class="container">
    <div>
        <h6><a href="{{route('apsipirkimas.show',[$apsipirkimas,$budget,$user])}}">Back</a></h6>
    </div>    
    <table class="table table-striped caption-top">
        <caption>Pirkinys</caption>
        <tr>
            <th>ID</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Preke/Paslauga</th>
            <th>Kiekis</th>
            <th>Kaina</th>
            <th>Depozitas</th>
            <th>Suma</th>
            <th colspan="2">Veiksmai...</th>           
        </tr>
        <tr >
            <td>{{$pirkinys->id}}</td>
            <td>{{$pirkinys->created_at}}</td>
            <td>{{$pirkinys->updated_at}}</td>     
            <td>{{$pirkinys->prekepaslauga->name}}</td>
            <td>{{$pirkinys->quantity}}</td>
            <td>{{$pirkinys->price}}</td>
            <td>{{$pirkinys->deposit}}</td>
            <td>{{$pirkinys->sum}}</td>
            @if(($auth_useris_role->id == '4')||($auth_useris_role->id == '5'))
            <td><a href="{{route('pirkinys.edit',[$pirkinys,$apsipirkimas,$budget,$user])}}">Redaguoti</a></td>
            <td><form method="POST" action="{{route('pirkinys.destroy',[$pirkinys,$user])}}">
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Trinti</button>
            </form></td>
            @endif
        </tr>
    </table>
    </div>
@endsection