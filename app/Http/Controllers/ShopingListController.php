<?php

namespace App\Http\Controllers;

use App\Models\ShopingList;
use App\Http\Requests\StoreShopingListRequest;
use App\Http\Requests\UpdateShopingListRequest;

class ShopingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopingLists  =   ShopingList::all();
        return  view('shopingList.index', ['shopingLists' => $shopingLists]);
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
     * @param  \App\Http\Requests\StoreShopingListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopingListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function show(ShopingList $shopingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopingList $shopingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopingListRequest  $request
     * @param  \App\Models\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopingListRequest $request, ShopingList $shopingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopingList $shopingList)
    {
        //
    }
}
