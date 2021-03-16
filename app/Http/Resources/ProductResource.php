<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        //falls wir einen Preis benötigen sollten, müssen wir ihn in der DB als integer speichern, oder als BigDecimal
        //Damit bleibt er akkurat und wir können ihn hier via folgendem code umwandeln:
        //'price' => number_format($this->price) / 100, 2);

        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
        ];
    }
}
