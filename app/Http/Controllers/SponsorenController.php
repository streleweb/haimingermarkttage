<?php

namespace App\Http\Controllers;

use App\Models\Sponsoren;
use App\Http\Resources\SponsorenResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SponsorenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorenliste = Sponsoren::paginate(4); // für 4 Sponsoren pro Seite unter /app/sponsoren im Frontend
        return SponsorenResource::collection($sponsorenliste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsoren.sponsorenanlegen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'sponsor_brandname' => 'min:2|max:30',
            'sponsor_vorname'=> 'min:2|max:30',
            'sponsor_nachname'=> 'min:2|max:30',
            'sponsor_websiteurl'=> 'min:10|max:100',
            'sponsor_logourl'=> 'min:10|max:100',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $sponsoren = new Sponsoren();
            $sponsoren->sponsor_brandname = $request->sponsor_brandname;
            $sponsoren->sponsor_vorname = $request->sponsor_vorname;
            $sponsoren->sponsor_nachname = $request->sponsor_nachname;
            $sponsoren->sponsor_websiteurl = $request->sponsor_websiteurl;
            $sponsoren->sponsor_logourl = $request->sponsor_logourl;
           
            if($sponsoren->save()){
                return new SponsorenResource($sponsoren);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsoren  $sponsoren
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsoren $sponsoren)
    {
        $sponsoren = Sponsoren::find($id);
        return $sponsoren;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsoren  $sponsoren
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsoren $sponsoren)
    {
        return view('sponsoren.edit')->with('sponsoren',$sponsoren);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsoren  $sponsoren
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsoren $sponsoren)
    {
        $sponsoren = Sponsoren::findOrFail($id);
        $sponsoren->id = $request->id;
        $sponsoren->sponsor_brandname = $request->sponsor_brandname;
        $sponsoren->sponsor_vorname = $request->sponsor_vorname;
        $sponsoren->sponsor_nachname = $request->sponsor_nachname;
        $sponsoren->sponsor_websiteurl = $request->sponsor_websiteurl;
        $sponsoren->sponsor_logourl = $request->sponsor_logourl;
        if($sponsoren->save())
        {
            return new SponsorenResource($sponsoren);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsoren  $sponsoren
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsoren $sponsoren)
    {
        $sponsoren = Sponsoren::findOrFail($id);
        $sponsoren->delete();
    }
}
