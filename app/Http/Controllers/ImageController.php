<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;


class ImageUploadController extends Controller
{
    /**
     * Speichere Ausstellerfotos, welche vom Admindashboard aus gesendet werden
     * lokal auf dem Server unter public/images/aussteller
     */
    public function handle(Request $request){

        if($file = $request->file('image'))
        {
            $fullFileName =$file->getClientOriginalName(); //gets full file name

            //Log::info($fullFileName);
    
            //Image public abspeichern
            /*
            $filepath = $request->file('image')->store('aussteller','public');*/
            $filepath = $request->file('image')->storeAs(
                'public', $fullFileName
            );
    
            //Filename, mit dem File gespeichert wurde als Response zurückgeben
            $response = [
                'filename' => $fullFileName,
                'filepath' => $filepath
            ];
    
            return response($response, 201); //success
        }

        else {
            return \response('Error. Achtung, maximale Filesize: 1.9MB! ', 200)
                   ->header('Content-Type', 'text/plain');}
        
    } 

    public function delete(Request $request){
        
        $file = $request->file("image");
        Storage::delete($file);
    }




}
