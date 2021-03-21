<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'news_anrede' => $this->news_anrede,
            'news_vorname' => $this->news_vorname,
            'news_nachname' => $this->news_nachname,           
            'news_email'=> $this->news_email,
        ];
    }
}
