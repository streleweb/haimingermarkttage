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
        $ausstellerliste = Aussteller::paginate(4); // für 4 aussteller pro Seite unter /app/aussteller im Frontend
        return AusstellerResource::collection($ausstellerliste);
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
            'aussteller_beschreibung'=> 'nullable|min:10|max:100',
            'aussteller_zonenfarbe' => 'required|min:2|max:15', 
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $aussteller = new Aussteller();
            $aussteller->aussteller_fullname = $request->aussteller_fullname;
            $aussteller->aussteller_beschreibung = $request->aussteller_beschreibung;
            $aussteller->aussteller_zonenfarbe = $request->aussteller_zonenfarbe;
           
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function edit(Aussteller $aussteller)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aussteller $aussteller)
    {
        //
    }
}
