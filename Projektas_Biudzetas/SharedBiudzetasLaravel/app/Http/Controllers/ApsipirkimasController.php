<?php

namespace App\Http\Controllers;

use App\Models\apsipirkimas;
use App\Http\Requests\StoreapsipirkimasRequest;
use App\Http\Requests\UpdateapsipirkimasRequest;

class ApsipirkimasController extends Controller
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
     * @param  \App\Http\Requests\StoreapsipirkimasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreapsipirkimasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function show(apsipirkimas $apsipirkimas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function edit(apsipirkimas $apsipirkimas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapsipirkimasRequest  $request
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapsipirkimasRequest $request, apsipirkimas $apsipirkimas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function destroy(apsipirkimas $apsipirkimas)
    {
        //
    }
}
