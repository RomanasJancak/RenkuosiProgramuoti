@extends('layouts.app')
@section('content')
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
            <td><a href="{{route('pirkinys.edit',[$pirkinys,$apsipirkimas,$budget,$user])}}">Redaguoti</a></td>
            <td><form method="POST" action="{{route('pirkinys.destroy',[$pirkinys,$user])}}">
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Trinti</button>
            </form></td>
        </tr>
    </table>
    @include('pirkinys.index', ['pirkiniai' => $apsipirkimas->pirkiniai])
    </div>
@endsection