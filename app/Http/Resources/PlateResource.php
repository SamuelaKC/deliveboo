<?php

namespace App\Http\Resources;

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
            'id'=>$this -> id,
            'name'=>$this -> name, 
            'description'=>$this -> description,
            'price'=>$this -> price,
            'available'=>$this -> available,
            'picture'=>$this -> picture,
            'user_id' =>$this -> user_id,
            'category_id' =>$this -> category_id,
            'ingredients' =>$this -> ingredient,
        ];
    }
}
