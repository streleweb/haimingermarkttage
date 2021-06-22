<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgrammpunktResource extends JsonResource
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
            'programmpunkt_titel' => $this->programmpunkt_titel,
            'programmpunkt_beschreibung' => $this->programmpunkt_beschreibung
        ];
    }
}
