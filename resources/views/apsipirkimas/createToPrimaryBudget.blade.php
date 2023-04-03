@extends('layouts.app')
@section('content')
<div class="container">
  <form action="">
    <div class="form-group">
      <label for="CountrySelect"></label>
      <input type="text" class="form-control" id="CountrySelect" aria-describedby="CountryHelp" placeholder="Enter Country">
      <small id="CountryHelp" class="form-text text-muted">Select Country where expense occured</small>
    </div>    
    <div class="form-group">
      <label for="VendorSelect"></label>
      <input type="text" class="form-control" id="VendorSelect" aria-describedby="VendorHelp" placeholder="Enter Vendor">
      <small id="VendorHelp" class="form-text text-muted">Select vendor where expense occured</small>
    </div>
    <div class="form-group">

    </div>
  </form>
</div>     
@endsection