<?php

namespace App\Http\Controllers;

use App\Models\Programmpunkt;
use Illuminate\Http\Request;
use App\Http\Resources\ProgrammpunktResource;
use Illuminate\Support\Facades\Validator;

class ProgrammpunktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmpunktliste = Programmpunkt::paginate(4); // für 4 Programmpunkte pro Seite unter /app/programmpunkt im Frontend
        return ProgrammpunktResource::collection($programmpunktliste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programmpunkt.programmpunktanlegen');
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
            'programmpunkt_titel' => 'required|min:2|max:30',
            'programmpunkt_beschreibung'=> 'nullable|min:2|max:30',,
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $programmpunkt = new Programmpunkt();
            $programmpunkt->programmpunkt_titel = $request->programmpunkt_titel;
            $programmpunkt->programmpunkt_beschreibung = $request->programmpunkt_beschreibung;
           
            if($programmpunkt->save()){
                return new ProgrammpunktResource($programmpunkt);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programmpunkt  $programmpunkt
     * @return \Illuminate\Http\Response
     */
    public function show(Programmpunkt $programmpunkt)
    {
        $programmpunkt = Programmpunkt::find($id);
        return $programmpunkt;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programmpunkt  $programmpunkt
     * @return \Illuminate\Http\Response
     */
    public function edit(Programmpunkt $programmpunkt)
    {
        return view('programmpunkt.edit')->with('programmpunkt',$programmpunkt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programmpunkt  $programmpunkt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programmpunkt $programmpunkt)
    {
        $programmpunkt = Programmpunkt::findOrFail($id);
        $programmpunkt->id = $request->id;
        $programmpunkt->programmpunkt_titel = $request->programmpunkt_titel;
        $programmpunkt->programmpunkt_beschreibung = $request->programmpunkt_beschreibung;
        if($programmpunkt->save())
        {
            return new ProgrammpunktResource($programmpunkt);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programmpunkt  $programmpunkt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programmpunkt $programmpunkt)
    {
        $programmpunkt->delete();
    }
}
