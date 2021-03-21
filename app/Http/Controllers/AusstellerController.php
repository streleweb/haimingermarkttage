<?php

namespace App\Http\Controllers;

use App\Models\Aussteller;
use Illuminate\Http\Request;
use App\Http\Resources\AusstellerResource;
use Illuminate\Support\Facades\Validator;

class AusstellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ausstellerliste = Aussteller::paginate(4); // für 4 Aussteller pro Seite unter /app/aussteller im Frontend
        return AusstellerResource::collection($ausstellerliste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aussteller.ausstelleranlegen');
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
            'aussteller_fullname' => 'required|min:2|max:30',
            'aussteller_beschreibung'=> 'required|min:10|max:100',
            'aussteller_brandingname' => 'required|min:2|max:15', 
            'aussteller_email' => 'required|min:2|max:15',
            'aussteller_telefonnummer' => 'required|min:2|max:15',
            'aussteller_websiteurl' => 'required|min:2|max:15',
            'aussteller_zonenfarbe' => 'required|min:2|max:15',
            'aussteller_bildurl' => 'required|min:2|max:15',
            'aussteller_jahre' => 'required|min:2|max:15',
            'aussteller_straße' => 'required|min:2|max:15',
            'aussteller_postleitzahl' => 'required|min:2|max:15', 
            'aussteller_wohnort' => 'required|min:2|max:15', 
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $aussteller = new Aussteller();
            $aussteller->aussteller_fullname = $request->aussteller_fullname;
            $aussteller->aussteller_beschreibung = $request->aussteller_beschreibung;
            $aussteller->aussteller_brandingname = $request->aussteller_brandingname;
            $aussteller->aussteller_email = $request->aussteller_email;
            $aussteller->aussteller_telefonnummer = $request->aussteller_telefonnummer;
            $aussteller->aussteller_websiteurl = $request->aussteller_websiteurl;
            $aussteller->aussteller_zonenfarbe = $request->aussteller_zonenfarbe;
            $aussteller->aussteller_bildurl = $request->aussteller_bildurl;
            $aussteller->aussteller_jahre = $request->aussteller_jahre;
            $aussteller->aussteller_straße = $request->aussteller_straße;
            $aussteller->aussteller_postleitzahl = $request->aussteller_postleitzahl;
            $aussteller->aussteller_wohnort = $request->aussteller_wohnort;
           
            if($aussteller->save()){
                return new AusstellerResource($aussteller);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function show(Aussteller $aussteller)
    {
        $aussteller = Aussteller::find($id);
        return $aussteller;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function edit(Aussteller $aussteller)
    {
        return view('aussteller.edit')->with('aussteller',$aussteller);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aussteller $aussteller)
    {
        $aussteller = Aussteller::findOrFail($id);
        $aussteller->id = $request->id;
        $aussteller->aussteller_fullname = $request->aussteller_fullname;
        $aussteller->aussteller_beschreibung = $request->aussteller_beschreibung;
        $aussteller->aussteller_brandingname = $request->aussteller_brandingname;
        $aussteller->aussteller_email = $request->aussteller_email;
        $aussteller->aussteller_telefonnummer = $request->aussteller_telefonnummer;
        $aussteller->aussteller_websiteurl = $request->aussteller_websiteurl;
        $aussteller->aussteller_zonenfarbe = $request->aussteller_zonenfarbe;
        $aussteller->aussteller_bildurl = $request->aussteller_bildurl;
        $aussteller->aussteller_jahre = $request->aussteller_jahre;
        $aussteller->aussteller_straße = $request->aussteller_straße;
        $aussteller->aussteller_postleitzahl = $request->aussteller_postleitzahl;
        $aussteller->aussteller_wohnort = $request->aussteller_wohnort;
        if($aussteller->save())
        {
            return new NewsResource($aussteller);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aussteller $aussteller)
    {
        $aussteller->delete();
    }
}
