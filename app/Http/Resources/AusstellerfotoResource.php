<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AusstellerfotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array with id, ausstellerfoto_name, ausstellerfoto_url & aussteller_id
     * zur Datenverarbeitung im Frontend.
     */
    public function toArray($request)
    {
        return [
        'id' => $this->id,
        'ausstellerfoto_name' => $this->ausstellerfoto_name,
        'ausstellerfoto_url' => $this->ausstellerfoto_url,
        'aussteller_id' => $this->aussteller_id,
        ];
    }
}
