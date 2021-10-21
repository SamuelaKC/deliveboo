<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Plate;
use App\Category;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    
        $plates = Plate::where('user_id', $this->id)->get()->groupBy('category_id');
        $plateCategory = [];
        foreach ($plates as $categoryId => $plate) {
            $category = Category::find($categoryId);
            $plateCategory[] = [
                'category_name' => $category->name,
                'plates' => $plate,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'description' => $this->description,
            'picture' => $this->picture,
            'tag' => $this->tag,
            'category_plate' => $plateCategory,
            'plates' => PlateResource::collection($this->plate),

        ];
    }
}
