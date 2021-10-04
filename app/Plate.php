<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function user() {
    return $this->belongsTo(User::class);
    }

    public function category() {
    return $this->belongsTo(Category::class);
    }

    public function order() {
    return $this->belongsToMany(Order::class);
    }

    public function ingredient() {
    return $this->belongsToMany(Ingredient::class);
    }
}