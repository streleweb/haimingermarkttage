<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    /**
     * Speichere Ausstellerfotos, welche vom Admindashboard aus gesendet werden
     * lokal auf dem Server unter public/images/aussteller
     */
    public function handle(Request $request, $filename){

        $file = $request->file('image');
        Storage::disk('public')->put($filename, $file);
        /*
        $filepath = $request->file('image')->store('images/aussteller');
        return $filepath;

        $image = $request->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images/aussteller');
        $image->move($destinationPath, $input['imagename']);
       */

        /*
        if(!Storage::disk('public_uploads')->put( $request->file('image'))) {
            return false;
        }*/
    }

    public function delete(Request $request){
        
        $file = $request->file("image");
        Storage::delete($file);
    }


}
