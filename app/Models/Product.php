<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,"category_id");
    }

    public function images(){
        return $this->morphMany(Media::class, "mediaable")->where("used_for", "product_image");
    }

    public function addProductImage($name){
        $this->images()->create(['used_for'=> "product_image",'name'=> $name]);
    }
}
