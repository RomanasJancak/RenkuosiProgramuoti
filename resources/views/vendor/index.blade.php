@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('vendor.store')}}">
    <p>
        <label for="vendor_name_id">New Vendor :</label>
        <input type="text" name="name" id="vendor_name_id" placeholder="Name">
        <input type="text" name="ChainName" id="vendor_ChainName_id" placeholder="Chain Name">
        <input type="text" name="adress" id="vendor_adress_id" placeholder="City, building apartment">
        <input type="text" name="code" id="vendor_companyCode_id" placeholder="Company code">
        <input type="text" name="vatcode" id="vendor_vatCode_id" placeholder="VAT code">            
    </p>
        @csrf
    <button type="submit">Add</button>
</form> 
<table class="table table-striped caption-top">
        <caption style="text-align:center">Vendors</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Chain name</th>
            <th>Adress</th>
            <th>Code</th>
            <th>Vatcode</th>
            <th>Created</th>
            <th>Updated</th>
            <th colspan="3">Actions<th>
        </tr>
        @foreach ($vendors as $vendor)
        <tr>
            <td>{{$vendor->id}}</td>
            <td id="{{class_basename($vendor).'_'.$vendor->id.'_nameTD'}}">{{$vendor->name}}</td>
            <td id="{{class_basename($vendor).'_'.$vendor->id.'_ChainNameTD'}}">{{$vendor->ChainName}}</td>
            <td id="{{class_basename($vendor).'_'.$vendor->id.'_adressTD'}}">{{$vendor->adress}}</td>
            <td id="{{class_basename($vendor).'_'.$vendor->id.'_codeTD'}}">{{$vendor->code}}</td>
            <td id="{{class_basename($vendor).'_'.$vendor->id.'_vatcodeTD'}}">{{$vendor->vatcode}}</td>
            <td>{{$vendor->created_at}}</td>
            <td>{{$vendor->updated_at}}</td>
            <td><button 
                    class="{{class_basename($vendor).'_editButton'}}"
                    id="{{class_basename($vendor).'_'.$vendor->id.'_editButton'}}"
                    name="{{$vendor->id}}">
                    &#9998
                </button>
                <form method="POST" action="{{route('vendor.update',[$vendor])}}">
                    <input id="{{class_basename($vendor).'_'.$vendor->id.'_nameInput'}}" type="hidden" name="name" value="{{$vendor->name}}"></input>
                    <input id="{{class_basename($vendor).'_'.$vendor->id.'_ChainNameInput'}}" type="hidden" name="ChainName" value="{{$vendor->ChainName}}"></input>
                    <input id="{{class_basename($vendor).'_'.$vendor->id.'_adressInput'}}" type="hidden" name="adress" value="{{$vendor->adress}}"></input>
                    <input id="{{class_basename($vendor).'_'.$vendor->id.'_codeInput'}}" type="hidden" name="code" value="{{$vendor->code}}"></input>
                    <input id="{{class_basename($vendor).'_'.$vendor->id.'_vatcodeInput'}}" type="hidden" name="vatcode" value="{{$vendor->vatcode}}"></input>
                    @csrf
                    <button hidden id="{{class_basename($vendor).'_'.$vendor->id.'_confirm'}}" >&#10003</button>
                </form>
                <button name="{{$vendor->id}}" class="{{class_basename($vendor).'_cancel'}}" hidden id="{{class_basename($vendor).'_'.$vendor->id.'_cancel'}}" >&#x2718</button>
                <form method="POST" action="{{route('vendor.destroy',[$vendor])}}">
                    @csrf
                    <button>&#9746;</button>
                </form>
            </td>

        </tr>
        @endforeach
</table>
@endsection