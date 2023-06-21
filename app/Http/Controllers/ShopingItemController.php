<?php

namespace App\Http\Controllers;

use App\Models\ShopingItem;
use App\Http\Requests\StoreShopingItemRequest;
use App\Http\Requests\UpdateShopingItemRequest;

class ShopingItemController extends Controller
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
     * @param  \App\Http\Requests\StoreShopingItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopingItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopingItem  $shopingItem
     * @return \Illuminate\Http\Response
     */
    public function show(ShopingItem $shopingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopingItem  $shopingItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopingItem $shopingItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopingItemRequest  $request
     * @param  \App\Models\ShopingItem  $shopingItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopingItemRequest $request, ShopingItem $shopingItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopingItem  $shopingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopingItem $shopingItem)
    {
        //
    }
}
