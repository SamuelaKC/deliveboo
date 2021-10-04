<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function plate() {
    return $this->belongsToMany(Plate::class);
    }
}