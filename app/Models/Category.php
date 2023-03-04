<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    public function addons(){
        return $this->hasMany(Addon::class,"category_id","id");
    }
}
