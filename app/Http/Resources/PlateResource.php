<?php

namespace App\Http\Resources;

use App\Category;
use App\Plate;
use Illuminate\Http\Resources\Json\JsonResource;

class PlateResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'ingredients' => $this->ingredient,
        ];
    }
}
