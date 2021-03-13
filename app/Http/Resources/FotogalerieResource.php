<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FotogalerieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array with id, fotogalerie_fotoname, fotogalerie_fotobeschreibung
     * and fotogalerie_fotourl json.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fotogalerie_fotoname' => $this->fotoname,
            'fotogalerie_fotobeschreibung' => $this->fotobeschreibung,
            'fotogalerie_fotourl' => $this->fotogalerie_fotourl
        ];
    }
}
