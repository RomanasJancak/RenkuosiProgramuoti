<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Http\Requests\StoreFriendshipRequest;
use App\Http\Requests\UpdateFriendshipRequest;

class FriendshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreFriendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriendRequest $request)
    {
        $friendship             =   new Friendship;
        $friendship->user_id    =   $request->user_id;
        $friendship->friend_id  =   $request->friend_id;
        $friendship->save();
        $friendship             =   new Friendship;
        $friendship->user_id    =   $request->friend_id;
        $friendship->friend_id  =   $request->user_id;
        $friendship->save();

        return redirect()->route('user.show',$request->friend_id)->withSuccess(__('Friendship created successfully.'));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friendship  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friendship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friendship  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friendship $friendship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFriendRequest  $request
     * @param  \App\Models\Friendship  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFriendRequest $request, Friend $friendship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friendship  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friendship $friendship)
    {   //dd($friendship);
        $id =   $friendship->friend_id;
        //dd($id);
        $friendshipreverse = Friendship::all()->where('user_id',$friendship->friend_id)->where('friend_id',$friendship->user_id);
        //dd($friendshipreverse->first());
        $friendship->delete();
        $friendshipreverse->first()->delete();
        //dd($friendshipRequest);
        return redirect()->route('user.show',$id)->withSuccess(__('Friendship removed'));
    //
    }
}
