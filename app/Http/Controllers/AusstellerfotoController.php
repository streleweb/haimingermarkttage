<?php

namespace App\Http\Controllers;

use App\Models\Ausstellerfoto;
use Illuminate\Http\Request;
use App\Http\Resources\AusstellerfotoResource;
use Illuminate\Support\Facades\Validator;

class AusstellerfotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ausstellerfotoliste = Ausstellerfoto::paginate(4); // für 4 Ausstellerfotos pro Seite unter /app/ausstellerfoto im Frontend
        return AusstellerfotoResource::collection($ausstellerfotoliste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ausstellerfoto.ausstellerfotoanlegen');
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
            'ausstellerfoto_name' => 'required|min:2|max:30',
            'ausstellerfoto_url'=> 'nullable|min:10|max:100',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $ausstellerfoto = new Ausstellerfoto();
            $ausstellerfoto->ausstellerfoto_name = $request->ausstellerfoto_name;
            $ausstellerfoto->ausstellerfoto_url = $request->ausstellerfoto_url;
           
            if($ausstellerfoto->save()){
                return new AusstellerfotoResource($ausstellerfoto);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ausstellerfoto  $ausstellerfoto
     * @return \Illuminate\Http\Response
     */
    public function show(Ausstellerfoto $ausstellerfoto)
    {
        $ausstellerfoto = Ausstellerfoto::find($id);
        return $ausstellerfoto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ausstellerfoto  $ausstellerfoto
     * @return \Illuminate\Http\Response
     */
    public function edit(Ausstellerfoto $ausstellerfoto)
    {
        return view('ausstellerfoto.edit')->with('ausstellerfoto',$ausstellerfoto);
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
        $ausstellerfoto = Ausstellerfoto::findOrFail($id);
        $ausstellerfoto->id = $request->id;
        $ausstellerfoto->ausstellerfoto_name = $request->ausstellerfoto_name;
        $ausstellerfoto->ausstellerfoto_url = $request->ausstellerfoto_url;
        $ausstellerfoto->aussteller_id = $request->aussteller_id;
        if($ausstellerfoto->save())
        {
            return new AusstellerfotoResource($ausstellerfoto);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ausstellerfoto  $ausstellerfoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ausstellerfoto $ausstellerfoto)
    {
        $ausstellerfoto->delete();
    }
}
