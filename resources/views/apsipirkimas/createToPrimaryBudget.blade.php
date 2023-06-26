@extends('layouts.app')
@section('content')
<!-- <script>
$('#ddlMember').on('change',function(){
    var get=$('select option:selected').text();
    document.getElementById('text_area').value=get;
});
</script> -->
<?php
 //$cookie_name = "CountryDefaultSelectorForShopForm";
 //$cookie_value = 3;
 //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
//  $cookie_name = "VendorDefaultSelectorForShopForm";
//  $cookie_value = 2;
//  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<div class="container">
  <form action="">
    <div class="form-group">
    <select class="form-select" aria-label="Select county">
        @foreach($countries as $country)
        <option 
          value="{{$country->id}}" 
            <?php 
              if((isset($_COOKIE["CountryDefaultSelectorForShopForm"]))&&($_COOKIE["CountryDefaultSelectorForShopForm"] == $country->id)) {echo 'selected';}
            ?>
        >{{$country->name}}
        </option>
        @endforeach
        
    </select>

    </div>    
    <div class="form-group">
      <label for="VendorSelect">Apsipirkimo Vieta</label>
      <select class="form-select" aria-label="Select county" id="vendroSelect">
        @foreach($vendors as $vendor)
        <option id="{{$vendor->id}}"
          value="{{$vendor->id}}" 
            <?php 
              if((isset($_COOKIE["VendorDefaultSelectorForShopForm"]))&&($_COOKIE["VendorDefaultSelectorForShopForm"] == $vendor->id)) {echo 'selected';}
            ?>
        >{{$vendor->name}}
        </option>
        @endforeach
        
    </select>
    </div>
    <div class="form-group">
      <select name="" id="">
        @foreach($countries as $country)
        <option value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
      </select>
    </div>
  </form>
</div>     
@endsection