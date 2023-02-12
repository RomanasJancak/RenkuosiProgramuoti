@extends('layouts.app')
@section('content')
<?php
$auth_useris_role = App\Models\Role::find($budget->users->where('id',auth()->user()->id)->first()->pivot->role_id);
?>
<div class="container">
    <div>
        <h6><a href="{{route('budget.show',[$budget,$user])}}">Back</a></h6>
    </div>    
    <table class="table table-striped caption-top">
        <caption>Apsipirkimas</caption>
        <tr>
            <th>ID</th>
            <th>Vendor</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Suma</th>
            <th>Shop</th>
            <th>Shop time</th>
            <th colspan="2">Actions</th>           
        </tr>
        <tr >
            <td>{{$apsipirkimas->id}}</td>
            <td>{{$apsipirkimas->vendor->name}}</td>
            <td>{{$apsipirkimas->created_at}}</td>
            <td>{{$apsipirkimas->updated_at}}</td>     
            <td>{{$apsipirkimas->suma}}</td>
            <td>{{$apsipirkimas->shop_id}}</td>
            <td>{{$apsipirkimas->shop_time}}</td>
            @if(($auth_useris_role->id == '4')||($auth_useris_role->id == '5'))
            <td><a href="{{route('apsipirkimas.edit',[$apsipirkimas,$budget,$user])}}">Edit</a></td>
            <td><a href="{{route('apsipirkimas.destroy',[$apsipirkimas,$budget,$user])}}">Ištrinti apsipirkimą</a></td>
            @endif
        </tr>
    </table>
    @include('pirkinys.index', ['pirkiniai' => $apsipirkimas->pirkiniai])
    </div>
@endsection