@extends('layouts.app')
@section('content')
<div class="container">
  {{-- dd(App\Models\Friendship::all()->where('user_id',2)->where('friend_id',3)) --}}
  <div class="table-responsive">
    <table class="table caption-top">
      <caption>Friendship requests from</caption>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          {{-- dd($user->friendshipRequests) --}}
          @foreach($user->friendshipRequestsTo as $friendshipRequestor)
          <tr>
            <th>{{$friendshipRequestor->name}}</th>
            <th>{{$friendshipRequestor->email}}</th>
            <th>Accept</th>
            <th>                  <form method="post" action="{{route('friendshiprequest.destroy',[$friendshipRequestor->getFriendshipRequest(auth()->user()->id)])}}">                   
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Decline</button>
                  </form></th>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
  <div class="table-responsive">
    <table class="table caption-top">
      <caption>Friendship requests to</caption>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {{-- dd($user->friendshipRequests) --}}
          @foreach($user->friendshipRequests as $friendshipRequestor)
          <tr>
            <th>{{$friendshipRequestor->name}}</th>
            <th>{{$friendshipRequestor->email}}</th>
            <th>                  <form method="post" action="{{route('friendshiprequest.destroy',[auth()->user()->getFriendshipRequest($friendshipRequestor->id)])}}">                   
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Cancel friend request</button>
                  </form></th>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
  <div class="table-responsive">
    <table class="table caption-top">
      <caption>Friends</caption>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {{-- dd($user->friendshipRequests) --}}
          @foreach($user->friends as $friend)
          <tr>
            <th>{{$friend->name}}</th>
            <th>{{$friend->email}}</th>
            <th>                  <form method="post" action="{{route('friendship.destroy',[auth()->user()->getFriendship($friend->id)])}}">
                    @csrf<button type="submit" class="btn btn-primary px-0 py-0">Unfriend</button>
                  </form></th>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection