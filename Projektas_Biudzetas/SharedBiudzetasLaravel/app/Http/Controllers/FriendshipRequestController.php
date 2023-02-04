<?php

namespace App\Http\Controllers;

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
     * @param  \App\Http\Requests\StoreFriendshipRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriendshipRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function show(FriendshipRequest $friendshipRequest)
    {
        //
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
    public function destroy(FriendshipRequest $friendshipRequest)
    {
        //
    }
}
