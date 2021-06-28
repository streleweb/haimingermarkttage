<?php

namespace App\Http\Controllers;

use App\Models\Aussteller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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
        //falls Aussteller schon vorhanden, nicht leer, nicht null, Fehlerresponse zurückgeben
        if (Aussteller::where('aussteller_email', $request->get('aussteller_email'))->exists() 
        && $request->get('aussteller_email') != "" && $request->get('aussteller_email') != null) {
            return 'Aussteller gibt es schon!';
         }
         else{
            
            $validator = Validator::make($request->all(),
                [
                  'aussteller_fullname' => 'required|min:2|max:30',
                  'aussteller_beschreibung'=> 'nullable|max:250',
                  'aussteller_zonenfarbe' => 'nullable|min:5|max:50', 
                  'aussteller_brandingname' => 'nullable|min:1|max:30', 
                  'aussteller_email' => 'nullable|min:2|max:100',
                  'aussteller_websiteurl' => 'nullable|max:200',
                  'aussteller_bildurl' => 'nullable',

                ]);
          
              if ($validator->fails()) {
                return \response('Error: Aussteller Name ist ein Pflichtfeld.. Geben Sie nicht zu viele Zeichen ein', 200)
                ->header('Content-Type', 'text/plain');

              }else {
                  $aussteller = new Aussteller();
                  $aussteller->aussteller_fullname = $request->aussteller_fullname;
                  $aussteller->aussteller_beschreibung = $request->aussteller_beschreibung;
                  $aussteller->aussteller_brandingname = $request->aussteller_brandingname;
                  $aussteller->aussteller_email = $request->aussteller_email;
                  $aussteller->aussteller_websiteurl = $request->aussteller_websiteurl;
                  $aussteller->aussteller_zonenfarbe = $request->aussteller_zonenfarbe;
                  $aussteller->aussteller_bildurl = $request->aussteller_bildurl;


                  if($aussteller->save()){
                    return \response('Aussteller erfolgreich gespeichert!', 200)
                    ->header('Content-Type', 'text/plain');
                  }

                  else{ 
                    return \response('Aussteller konnte nicht angelegt werden! Gibt es ihn schon?', 200)
                    ->header('Content-Type', 'text/plain');
                      }
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
    public function update(Request $request, $id)
    {
        $aussteller = Aussteller::findOrFail($id);
        if($aussteller->update($request->all())) return $aussteller;
        else return "Aussteller konnte nicht upgedated werden...";
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function destroy($ausstellerFullName)
    {
        if(Aussteller::where('aussteller_fullname', $ausstellerFullName)->delete()){
            return \response('Aussteller erfolgreich gelöscht!', 200)
            ->header('Content-Type', 'text/plain');
        }
        else return \response('Aussteller nicht vorhanden...', 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Search for Aussteller-name
     * 
     * @param str $name
     * 
     */
    public function search($name){
        return Aussteller::where('aussteller_fullname', 'like', '%'.$name.'%')->get(); 
    }

}
