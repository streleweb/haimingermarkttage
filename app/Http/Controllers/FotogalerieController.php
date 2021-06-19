<?php

namespace App\Http\Controllers;

use App\Models\Fotogalerie;
use App\Http\Resources\FotogalerieResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FotogalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fotogalerieliste = Fotogalerie::paginate(4); // für 4 Fotogalerien pro Seite unter /app/fotogalerie im Frontend
        return FotogalerieResource::collection($fotogalerieliste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fotogalerie.fotogalerieanlegen');
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
            'fotogalerie_fotoname' => 'required|min:2|max:30',
            'fotogalerie_fotobeschreibung'=> 'nullable|min:10|max:100',
            'fotogalerie_fotourl'=> 'nullable|min:10|max:100',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $fotogalerie = new Fotogalerie();
            $fotogalerie->fotogalerie_fotoname = $request->fotogalerie_fotoname;
            $fotogalerie->fotogalerie_fotobeschreibung = $request->fotogalerie_fotobeschreibung;
            $fotogalerie->fotogalerie_fotourl = $request->fotogalerie_fotourl;
           
            if($fotogalerie->save()){
                return new FotogalerieResource($fotogalerie);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotogalerie  $fotogalerie
     * @return \Illuminate\Http\Response
     */
    public function show(Fotogalerie $fotogalerie)
    {
        $fotogalerie = Fotogalerie::find($id);
        return $fotogalerie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotogalerie  $fotogalerie
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotogalerie $fotogalerie)
    {
        return view('fotogalerie.edit')->with('fotogalerie',$fotogalerie);
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
        $fotogalerie = Fotogalerie::findOrFail($id);
        $fotogalerie->id = $request->id;
        $fotogalerie->fotogalerie_fotoname = $request->fotogalerie_fotoname;
        $fotogalerie->fotogalerie_fotobeschreibung = $request->fotogalerie_fotobeschreibung;
        $fotogalerie->fotogalerie_fotourl = $request->fotogalerie_fotourl;

        if($fotogalerie->save())
        {
            return new FotogalerieResource($fotogalerie);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotogalerie  $fotogalerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotogalerie $fotogalerie)
    {
        $fotogalerie = Fotogalerie::findOrFail($id);
        $fotogalerie->delete();
    }
}
