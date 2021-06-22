<?php

namespace App\Http\Controllers;

use App\Models\Aussteller;
use Illuminate\Http\Request;
use App\Http\Resources\AusstellerResource;
use Illuminate\Support\Facades\Validator;

class AusstellerController extends Controller
{
    /**
     * Aussteller anzeigen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ausstellerliste = Aussteller::paginate(4); // Aussteller::paginate(4); für 4 aussteller pro Seite unter /app/aussteller im Frontend
        //return AusstellerResource::collection($ausstellerliste);
        return AusstellerResource::collection(Aussteller::all());
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
     * Neuen Aussteller in Datenbank speichern
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'aussteller_fullname' => 'required|min:2|max:30',
            'aussteller_beschreibung'=> 'nullable|min:10|max:200',
            'aussteller_zonenfarbe' => 'nullable|min:2|max:15', 
            'aussteller_beschreibung'=> 'nullable|min:10|max:100',
            'aussteller_brandingname' => 'nullable|min:2|max:30', 
            'aussteller_email' => 'nullable|min:2|max:100',
            'aussteller_telefonnummer' => 'nullable|min:2|max:20',
            'aussteller_websiteurl' => 'nullable|min:10|max:100',
            'aussteller_zonenfarbe' => 'nullable|min:2|max:15',
            'aussteller_bildurl' => 'nullable|min:10|max:100',
            
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
        
        if($aussteller->save())
        {
            return new AusstellerResource($aussteller);
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
        $aussteller = Aussteller::findOrFail($id);
        $aussteller->delete();
    }
}
