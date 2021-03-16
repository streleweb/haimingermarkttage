<?php

namespace App\Http\Controllers;

use App\Models\Ausstellerfoto;
use Illuminate\Http\Request;
use App\Http\Resources\AusstellerfotoResource;

class AusstellerfotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return AusstellerfotoResource::collection(Ausstellerfoto::all());
        $ausstellerfotoliste = Ausstellerfoto::paginate(4); // für 4 ausstellerfoto pro Seite unter /app/ausstellerfoto im Frontend
        return AusstellerfotoResource::collection($ausstellerfotoliste);
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
        /*//Test
        $user = User::find(1);
 
        $phone = new Phone;
        $phone->phone = '9429343852';
 
        $user->phone()->save($phone);*/

        $validator = Validator::make($request->all(),
        [
            'ausstellerfoto_name' => 'required|min:2|max:30',
            'ausstellerfoto_url'=> 'nullable|min:10|max:50',
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
