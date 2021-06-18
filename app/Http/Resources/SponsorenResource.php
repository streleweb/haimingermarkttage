<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SponsorenResource extends JsonResource
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
            'sponsor_brandname' => $this->sponsor_brandname,
            'sponsor_vorname' => $this->sponsor_vorname,
            'sponsor_nachname' => $this->sponsor_nachname,
            'sponsor_websiteurl' => $this->sponsor_websiteurl,
            'sponsor_logourl' => $this->sponsor_logourl,
        ];
    }
}
