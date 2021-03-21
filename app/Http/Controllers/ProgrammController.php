<?php

namespace App\Http\Controllers;

use App\Models\Programm;
use Illuminate\Http\Request;
use App\Http\Resources\ProgrammResource;
use Illuminate\Support\Facades\Validator;

class ProgrammController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmliste = Programm::paginate(4); // für 4 Programme pro Seite unter /app/programm im Frontend
        return ProgrammResource::collection($programmliste);
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
            'programm_titel' => 'required|min:2|max:30',
            'programm_beschreibung'=> 'nullable|min:2|max:30',,
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $programm = new Programm();
            $programm->programm_titel = $request->programm_titel;
            $programm->programm_beschreibung = $request->programm_beschreibung;
           
            if($programm->save()){
                return new ProgrammResource($programm);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function edit(Programm $programm)
    {
        return view('programm.edit')->with('programm',$programm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programm $programm)
    {
        $programm = Programm::findOrFail($id);
        $programm->id = $request->id;
        $programm->programm_titel = $request->programm_titel;
        $programm->programm_beschreibung = $request->programm_beschreibung;
        if($programm->save())
        {
            return new ProgrammResource($programm);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programm $programm)
    {
        $programm->delete();
    }
}
