<?php

namespace App\Http\Controllers;

use App\Models\UserBudget;
use App\Http\Requests\StoreUserBudgetRequest;
use App\Http\Requests\UpdateUserBudgetRequest;

class UserBudgetController extends Controller
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
     * @param  \App\Http\Requests\StoreUserBudgetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserBudgetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserBudget  $userBudget
     * @return \Illuminate\Http\Response
     */
    public function show(UserBudget $userBudget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserBudget  $userBudget
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBudget $userBudget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserBudgetRequest  $request
     * @param  \App\Models\UserBudget  $userBudget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserBudgetRequest $request, UserBudget $userBudget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserBudget  $userBudget
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBudget $userBudget)
    {
        //
    }
}
