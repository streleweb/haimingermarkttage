<?php

namespace App\Http\Controllers;

use App\Models\Ausstellerfoto;
use Illuminate\Http\Request;

class AusstellerfotoController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Test
        $user = User::find(1);
 
        $phone = new Phone;
        $phone->phone = '9429343852';
 
        $user->phone()->save($phone);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ausstellerfoto  $ausstellerfoto
     * @return \Illuminate\Http\Response
     */
    public function show(Ausstellerfoto $ausstellerfoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ausstellerfoto  $ausstellerfoto
     * @return \Illuminate\Http\Response
     */
    public function edit(Ausstellerfoto $ausstellerfoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ausstellerfoto  $ausstellerfoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ausstellerfoto $ausstellerfoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ausstellerfoto  $ausstellerfoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ausstellerfoto $ausstellerfoto)
    {
        //
    }
}
