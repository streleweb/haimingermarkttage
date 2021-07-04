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
            'news_titel' => $this->news_titel,
            'news_textfeld' => $this->news_textfeld,
            'news_bild_url' => $this->news_bild_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
