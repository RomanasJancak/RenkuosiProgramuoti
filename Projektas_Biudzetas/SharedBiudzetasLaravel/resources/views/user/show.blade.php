@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-2"><!-- Kairė pusė-->
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{asset('images/photos_Profile/default.png')}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{$user->name}}</h5>
            <p class="text-muted mb-0">

            </p>
            <div class="d-flex justify-content-center">
                {{-- dd((auth()->user() == $user)) --}}
                @if((auth()->user()->isFriend($user)))
                  <form method="post" action="">
                    @csrf<button type="button" class="btn btn-primary px-0 py-0">Unfriend</button>
                  </form>
                @elseif(auth()->user()->hasFriendRequest($user))
                  <form method="post" action="">
                    @csrf<button type="button" class="btn btn-primary px-0 py-0">Cancel friend request</button>
                  </form>
                @elseif((auth()->user()->id == $user->id))
                @else
                  <form method="post" action="">
                    @csrf<button type="button" class="btn btn-primary px-0 py-0">Send friend request</button>
                  </form>
                @endif
                @if((auth()->user()->id != $user->id))
                  <button type="button" class="btn btn-outline-primary  px-0 py-0 ms-1">Message</button>
                @endif  
            </div>
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
        <div class="row ">
            @foreach($user->budgets as $budget)
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <div class="row ">
                    <div class="col ">
                    <p class="mb-0"><span class="text-primary font-italic me-1"><em>Budget </em></span><a href="{{route('budget.show',[$budget,$user])}}">{{$budget->name}}</a>
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
            @endforeach
        </div>
      </div>
    </div>
</div>
@endsection