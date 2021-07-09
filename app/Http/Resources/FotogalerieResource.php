<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FotogalerieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fotogalerie_fotoname' => $this->fotogalerie_fotoname,
            'fotogalerie_fotobeschreibung' => $this->fotogalerie_fotobeschreibung,
            'fotogalerie_fotourl' => $this->fotogalerie_fotourl,
            'created_at' => $this->created_at
        ];
    }
}
