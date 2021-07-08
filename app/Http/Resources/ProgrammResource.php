<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgrammResource extends JsonResource
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
            'programm_titel' => $this->programm_titel,
            'programm_beschreibung' => $this->programm_beschreibung,
            'programm_bild_url' => $this->programm_bild_url
        ];
    }
}
