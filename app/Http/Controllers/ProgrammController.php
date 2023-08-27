<?php

namespace App\Http\Controllers;

use App\Models\Programm;
use Illuminate\Http\Request;
use App\Http\Resources\ProgrammResource;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; //Date

class ProgrammController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$programmliste = Programm::paginate(4); // für 4 Programme pro Seite unter /app/programm im Frontend
        return ProgrammResource::collection(Programm::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programm.programmanlegen');
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
            'programm_titel' => 'required|min:2|max:70',
            'programm_beschreibung'=> 'nullable|min:10|max:500',
            'programm_bild_url' => 'nullable|min:1'
        ]);

        if ($validator->fails()) {
            return \response('Programm-Post nicht gespeichert! Beachten Sie die Maximal-Zeichenlänge und geben Sie einen Titel an.', 400)
            ->header('Content-Type', 'text/plain');

        }else {
            $programm = new Programm();
            $programm->programm_titel = $request->programm_titel;
            $programm->programm_beschreibung = $request->programm_beschreibung;
            $programm->programm_bild_url = $request->programm_bild_url;

            $date = Carbon::now();
            $programm->created_at=$date->toDateTimeString();

            if($programm->save()){
                return \response('Programm-Post erfolgreich gespeichert!', 200)
                ->header('Content-Type', 'text/plain');;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function show(Programm $programm)
    {
        $programm = Programm::find($id);
        return $programm;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $programm = Programm::findOrFail($request->id);
        $programm->id = $request->id;
        $programm->programm_titel = $request->programm_titel;
        $programm->programm_beschreibung = $request->programm_beschreibung;
        $programm->programm_bild_url = $request->programm_bild_url;

        $date = Carbon::now();
        $programm->created_at=$date->toDateTimeString();

        if($programm->save())
        {
            return \response('Programm erfolgreich aktualisiert!', 200)
                ->header('Content-Type', 'text/plain');
        }else{
            return \response('Programm update in DB fehlgeschlagen!', 400)
            ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programm = Programm::findOrFail($id);
        $programm->delete();
    }
}
