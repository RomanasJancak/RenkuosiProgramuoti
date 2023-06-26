@extends('layouts.app')
@section('content')
{{--  dd(get_class(auth()->user())) --}}
{{-- dd((auth()->user() == $user)) --}}
{{-- dump(auth()->user()) --}}
{{-- dd($user) --}}
@if(auth()->user() == $user)
{{-- dd('test') --}}
@endif
{{-- dd(auth()->user()->getPrimaryBudget()) --}}
<?php echo 'test';


?>
<div class="container">

    <div class="row">
      <div class="col-lg-2"><!-- Kairė pusė-->
      <!-- Vartotojo snukis perkelti i dropdown arba pašalinti : 2023-05-01 deadline
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{asset('images/photos_Profile/default.png')}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{$user->name}}</h5>
            <p class="text-muted mb-0">

            </p>
            <div class="d-flex justify-content-center">
                {{-- dd((auth()->user() == $user)) --}}
                {{-- dd(auth()->user()->getFriendshipRequest($user->id)) --}}
                @if((auth()->user()->isFriend($user)))
                  <form method="post" action="{{route('friendship.destroy',[auth()->user()->getFriendship($user->id)])}}">
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Unfriend</button>
                  </form>
                @elseif(auth()->user()->hasFriendRequest($user))
                {{-- dd(auth()->user()->getFriendshipRequest($user->id)) --}}
                  <form method="post" action="{{route('friendshiprequest.destroy',[auth()->user()->getFriendshipRequest($user->id)])}}">                   
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Cancel friend request</button>
                  </form> 
                @elseif((auth()->user()->id == $user->id)) {{-- @elseif((auth()->user()->id == $user->id)) --}}
                    {{-- dd('praeina') --}}
                @else
                  <form method="post" action="{{route('friendshiprequest.store')}}">
                    <input hidden class="form-control" type="text" name="sender_id" value="{{auth()->user()->id}}" placeholder="Users name">
                    <input hidden class="form-control" type="text" name="receiver_id" value="{{$user->id}}" placeholder="Users name">
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Send friend request</button>
                  </form>
                @endif
                @if((auth()->user()->id != $user->id))
                  <button type="button" class="btn btn-outline-primary  px-0 py-0 ms-1">Message</button>
                @endif  
            </div>
          </div>
        </div>
      -->
        <div class="card mb-4">
          <div class="card-body p-0">
            <a class="btn btn-info" href="{{route('apsipirkimas.createToPrimaryBudget',[auth()->user()->getPrimaryBudget(),$user])}}">Shop</a> 
          </div>
        </div>  
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
                <li class=" list-group-item nav-header disabled">Shoping list</li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fas fa-globe fa-lg text-warning"></i> -->
                <p class="mb-0">ToBuy item</p>
                <p class="mb-0">Quantity</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-github fa-lg" style="color: #333333;"></i> -->
                <p class="mb-0">ToBuy item</p>
                <p class="mb-0">Quantity</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i> -->
                <p class="mb-0">ToBuy item</p>
                <p class="mb-0">Quantity</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i> -->
                <p class="mb-0">ToBuy item</p>
                <p class="mb-0">Quantity</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i> -->
                <p class="mb-0">ToBuy item</p>
                <p class="mb-0">Quantity</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-10"><!-- Dešinė pusė-->
      <!--
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Roles</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                  @foreach($user->getRoleNames() as $rolename)
                    {{$rolename.' '}}
                @endforeach
                </p>
              </div>
            </div>
          </div>
        </div>
      -->  
        <div class="row">
          <div class="accordion" id="accordionExample">
            @foreach($user->budgets as $budget)            
              <div class="accordion-item ">
                <h2 class="accordion-header " id="heading{{$budget->id}}">
                  <button class="accordion-button 
                    @if($budget->get_owner()->id == auth()->user()->id)
                    bg-primary text-white
                    @endif
                     
                  collapsed" type="button" data-bs-toggle="collapse" data-bs-theme="light" data-bs-target="#collapse{{$budget->id}}" aria-expanded="false" aria-controls="collapse{{$budget->id}}">
                    Budget '{{$budget->name}}' of {{$budget->get_owner()->name}}
                  </button>
                </h2>
                <div id="collapse{{$budget->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$budget->id}}" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="col-md-6">
                      <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                          <div class="row ">
                              <div class="col ">
                              <p class="mb-0"><span class="text-primary font-italic me-1"><em>Budget </em></span><a class="text-decoration-none" href="{{route('budget.show',[$budget,$user])}}">{{$budget->name}}</a>
                              </p>
                              </div>
                              <div class="col ">
                              <p class="mb-4"><span class="text-primary font-italic me-1">Owner</span>{{$budget->get_owner()->name}}
                              </p>
                              </div>
                              <div class="col ">
                              <p class="mb-4"><span class="text-primary font-italic me-1">Your role</span>{{$budget->get_currentUser_role()}}
                              </p>
                              </div>
                          </div>
                          <div class="bg-light rounded m-0">
                              <div class="d-flex d-flex justify-content-between ">
                                  <p class="mb-0" style="font-size: .77rem;">Period</p>
                                  <p class="mb-0" style="font-size: .77rem;">Income</p>
                                  <p class="my-0" style="font-size: .77rem;">Expense</p>
                              </div>
                              <hr class="mt-0 mb-0">
                              <div class="d-flex justify-content-between mt-1">
                                  <p class="mb-0" style="font-size: .77rem;">Total</p>
                                  <p class="mb-0" style="font-size: .77rem;">{{$budget->expenses_total_text()}} &#x20AC;</p>
                              </div>
                              <div class="d-flex justify-content-between mt-1">
                                  <p class="mb-0" style="font-size: .77rem;">Last month</p>
                                  <p class="mb-0" style="font-size: .77rem;">{{$budget->expences_lastMonth_text()}} &#x20AC;</p>
                              </div>
                              <div class="d-flex justify-content-between mt-1">
                                  <p class="mb-0" style="font-size: .77rem;">This month</p>
                                  <p class="mb-0" style="font-size: .77rem;">{{$budget->expences_thisMonth_text()}} &#x20AC;</p>
                              </div>
                              <div class="d-flex justify-content-between mt-1">
                                  <p class="mb-0" style="font-size: .77rem;">Today</p>
                                  <p class="mb-0" style="font-size: .77rem;">{{$budget->expenses_total_text()}} &#x20AC;</p>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>                    
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>        
      </div>
    </div>
</div>
@endsection