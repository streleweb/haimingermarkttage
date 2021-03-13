<?php

namespace App\Http\Controllers;

use App\Models\Fotogalerie;
use Illuminate\Http\Request;
use App\Http\Resources\FotogalerieResource;

class FotogalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FotogalerieResource::collection(Fotogalerie::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotogalerie  $fotogalerie
     * @return \Illuminate\Http\Response
     */
    public function show(Fotogalerie $fotogalerie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotogalerie  $fotogalerie
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotogalerie $fotogalerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotogalerie  $fotogalerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotogalerie $fotogalerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotogalerie  $fotogalerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotogalerie $fotogalerie)
    {
        //
    }
}
