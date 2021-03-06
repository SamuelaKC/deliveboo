<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function user() {
    return $this-> belongsToMany(User::class)->withTimestamps();
    }
}