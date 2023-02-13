<?php

namespace App\Http\Controllers;

use App\Models\Ghost;
use App\Http\Requests\StoreGhostRequest;
use App\Http\Requests\UpdateGhostRequest;

class GhostController extends Controller
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
     * @param  \App\Http\Requests\StoreGhostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGhostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ghost  $ghost
     * @return \Illuminate\Http\Response
     */
    public function show(Ghost $ghost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ghost  $ghost
     * @return \Illuminate\Http\Response
     */
    public function edit(Ghost $ghost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGhostRequest  $request
     * @param  \App\Models\Ghost  $ghost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGhostRequest $request, Ghost $ghost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ghost  $ghost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ghost $ghost)
    {
        //
    }
}
