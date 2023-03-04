<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    // Function to get related addons for particular category
    public function addons(){
        return $this->hasMany(Addon::class,"category_id","id");
    }
}
