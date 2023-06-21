<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\FriendshipRequest;
use App\Http\Requests\StoreFriendshipRequestRequest;
use App\Http\Requests\UpdateFriendshipRequestRequest;

class FriendshipRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('test');
        $FriendshipRequests = FriendshipRequest::all();
        return view('friendshipRequest.index', ['friendshipRequests' => $FriendshipRequests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFriendshipRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriendshipRequestRequest $request)
    {
        $friendshipRequest              =   new FriendshipRequest;
        $friendshipRequest->user_id     =   $request->sender_id;
        $friendshipRequest->friend_id   =   $request->receiver_id;
        $friendshipRequest->save();

        return redirect()->route('user.show',$request->receiver_id)->withSuccess(__('Budget created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function show(FriendshipRequest $friendshipRequest,$user)
    {
        $user   = User::find($user);
        return view('friendshipRequest.show', ['user' => $user]);
        //return view('permission.show',['permission' =>  $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFriendshipRequestRequest  $request
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFriendshipRequestRequest $request, FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($friendshipRequest)
    {   //dd($friendshipRequest);
        $id =   FriendshipRequest::find($friendshipRequest)->friend_id;

        FriendshipRequest::find($friendshipRequest)->delete();
        //dd($friendshipRequest);
        return redirect()->route('user.show',$id)->withSuccess(__('Friendship request canceled'));

    }
}
