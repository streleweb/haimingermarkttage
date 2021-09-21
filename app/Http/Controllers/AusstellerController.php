<?php

namespace App\Http\Controllers;

use App\Models\Aussteller;
use App\Models\Produktreiter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\AusstellerResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model as Eloquent;


class AusstellerController extends Controller
{
    /**
     * Aussteller anzeigen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AusstellerResource::collection(Aussteller::all());
    }

    /**
     * ProduktReiter von einem spezifischen Aussteller zurückgeben
     */
    public function getProduktReiter($request){
        if (Aussteller::where('aussteller_fullname', $request->get('aussteller_fullname'))->exists()){
            $aussteller = Aussteller::where('aussteller_fullname', $requestFullName);
            $produktReiterDesAusstellers = $aussteller->produktreiter; //returns laravel collection

            return $produktReiterDesAusstellers;
        }
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
        //Falls ein Aussteller schon vorhanden ist, nicht leer ist und nicht null ist,
        //eine Fehler-Response zurückgeben
        if (Aussteller::where('aussteller_fullname', $request->get('aussteller_fullname'))->exists() 
        && $request->get('aussteller_email') != "" && $request->get('aussteller_email') != null) {
            return \response('Error: Aussteller ist schon in DB vorhanden! ', 200)
                    ->header('Content-Type', 'text/plain');
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

            }else{
                  $aussteller = new Aussteller();
                  $aussteller->aussteller_fullname = $request->aussteller_fullname;
                  $aussteller->aussteller_beschreibung = $request->aussteller_beschreibung;
                  $aussteller->aussteller_brandingname = $request->aussteller_brandingname;
                  $aussteller->aussteller_email = $request->aussteller_email;
                  $aussteller->aussteller_websiteurl = $request->aussteller_websiteurl;
                  $aussteller->aussteller_zonenfarbe = $request->aussteller_zonenfarbe;
                  $aussteller->aussteller_bildurl = $request->aussteller_bildurl;


                  if($aussteller->save()){
                      //Wenn Aussteller erfolgreich gespeichert wurde, speichere auch die zugehörigen Produktreiter in die DB
                    
                    if($request->aussteller_produktreiter){
                        $aussteller_produktreiter_array = $request->aussteller_produktreiter;

                        $aussteller->produktreiters()->sync($aussteller_produktreiter_array);
                    }
                    
                    // $ausstellerrr = Aussteller::first();
                    // $ausstellerrr->produktreiter()->attach([2,3,4]);
                    
                    // foreach ($aussteller_produktreiter_array as $pr) {
                    //     $produktreiterr = Produktreiter::find($pr);
                    //     $produktreiterr->aussteller()->([1]);
                    // }
                    
                    // //jeweilige ID durch Pivot-Table zuordnen
                    //  $savedAussteller->produktreiter()->attach($aussteller_produktreiter_array);

                    return \response('Aussteller erfolgreich gespeichert!', 200)
                    ->header('Content-Type', 'text/plain');
                    
                  }

                  else{ 
                    return \response('Aussteller konnte nicht angelegt werden! Stellen Sie sicher, dass der Aussteller noch
                                      nicht angelegt ist.', 200)
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
    public function show($id)
    {
        // $aussteller = Aussteller::find($id);
        $produktReiterDesAusstellers = Aussteller::find($id)->produktreiters()->get();
        return $produktReiterDesAusstellers;
    }

    public function getAllAusstellerOfSpecificProduktreiter($produktReiterName){
        if($produktReiterName == "Lebensmittel"){
            $allLebensmittelAussteller = Produktreiter::find(1)->ausstellers()->get();
            return AusstellerResource::collection($allLebensmittelAussteller);
        }
        if($produktReiterName == "Gastronomie"){
            $allLebensmittelAussteller = Produktreiter::find(2)->ausstellers()->get();
            return AusstellerResource::collection($allLebensmittelAussteller);
        }
        if($produktReiterName == "Handwerk"){
            $allLebensmittelAussteller = Produktreiter::find(3)->ausstellers()->get();
            return AusstellerResource::collection($allLebensmittelAussteller);
        }
        if($produktReiterName == "Textil"){
            $allLebensmittelAussteller = Produktreiter::find(4)->ausstellers()->get();
            return AusstellerResource::collection($allLebensmittelAussteller);
        }
        if($produktReiterName == "Allerlei"){
            $allLebensmittelAussteller = Produktreiter::find(5)->ausstellers()->get();
            return AusstellerResource::collection($allLebensmittelAussteller);
        }
    }

    public function getLebensmittelAussteller(){
        
    }
    public function getGastronomieAussteller(){

    }
    public function getHandwerkAussteller(){

    }
    public function getTextilAussteller(){

    }
    public function getAllerleiAussteller(){

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit(Aussteller $aussteller)
    {
        return view('aussteller.edit')->with('aussteller',$aussteller);
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aussteller  $aussteller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   //get request data
        $requestId = $request->get('aussteller_id');
        $requestFullName = $request->get('aussteller_fullname');
        $requestBeschreibung = $request->get('aussteller_beschreibung');
        $requestBrandingName = $request->get('aussteller_brandingname');
        $requestEmail = $request->get('aussteller_email');
        $requestWebsiteUrl = $request->get('aussteller_websiteurl');
        $requestZonenfarbe = $request->get('aussteller_zonenfarbe');
        $requestBildUrl = $request->get('aussteller_bildurl');

        if (Aussteller::where('aussteller_fullname', $requestFullName)->exists() 
        && $requestFullName != "" && $requestFullName != null) {
            
            $aussteller = Aussteller::where('aussteller_fullname', $requestFullName);
            //$aussteller = Aussteller::find($request->get('id'));
            //added 04 07 2021 to make it possible to update Aussteller only on specific fields
            
        if($requestBeschreibung != null && $requestBeschreibung != ""){
            $aussteller->update(['aussteller_beschreibung' => $requestBeschreibung]);
        
        }
        if($requestBrandingName != null && $requestBrandingName != ""){
            $aussteller->update(['aussteller_brandingname' => $requestBrandingName]);
        }
        if($requestEmail != null && $requestEmail != ""){
            $aussteller->update(['aussteller_email' => $requestEmail]);
        }
        if($requestWebsiteUrl != null && $requestWebsiteUrl != ""){
            $aussteller->update(['aussteller_websiteurl' => $requestWebsiteUrl]);
        }
        if($requestZonenfarbe != null && $requestZonenfarbe != ""){
            $aussteller->update(['aussteller_zonenfarbe' => $requestZonenfarbe]);
        }
        if($requestBildUrl != null && $requestBildUrl != ""){
            $aussteller->update(['aussteller_bildurl' => $requestBildUrl]);
        }
        //16 09 2021
        if($request->aussteller_produktreiter){
            $aussteller_produktreiter_array = $request->aussteller_produktreiter;

            
            $ausstellerrr = Aussteller::find($request->aussteller_id);
                    // $ausstellerrr->produktreiter()->attach([2,3,4]);
            //$ausstellerPseudo->produktreiters()->sync($aussteller_produktreiter_array);
            
            $ausstellerrr->produktreiters()->detach();
            $ausstellerrr->produktreiters()->sync($aussteller_produktreiter_array);
        }
        

        //$aussteller->save();
        //$aussteller->update($request->all());
            return \response('Updated.',200)->header('Content-Type', 'text/plain');
        }else {
            return \response('Error: Aussteller ist nicht in DB vorhanden! ', 200)
                    ->header('Content-Type', 'text/plain');}

            /*
        $aussteller = Aussteller::findOrFail($id);
        if($aussteller->update($request->all())) return $aussteller;
        else return "Aussteller konnte nicht upgedated werden...";*/
        
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
