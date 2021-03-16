<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AusstellerResource extends JsonResource
{
    /**
     * Nur relevante Daten zurückgeben, created_at und updated_at werden
     * nicht mitreturned.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array with everything BUT created_at and updated_at
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'aussteller_fullname' => $this->aussteller_fullname,
            'aussteller_beschreibung' => $this->aussteller_beschreibung,
            'aussteller_brandingname' => $this->aussteller_brandingname,           
            'aussteller_email'=> $this->aussteller_email,
            'aussteller_telefonnummer'=> $this->aussteller_telefonnummer,
            'aussteller_websiteurl'=> $this->aussteller_websiteurl,
            'aussteller_zonenfarbe'=> $this->aussteller_zonenfarbe,
            'aussteller_bildurl'=> $this->aussteller_bildurl,
            'aussteller_jahre'=> $this->aussteller_jahre,
            'aussteller_straße'=> $this->aussteller_straße,
            'aussteller_postleitzahl'=> $this->aussteller_postleitzahl,
            'aussteller_wohnort'=> $this->aussteller_wohnort,
        ];
    }
}
