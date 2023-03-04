<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Addon extends Model
{
    use HasFactory;

    // Function to get related category object for particular addon
    
    public function category(){
        return $this->belongsTo(Category::class,"category_id");
    }
}
