<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

    // Function to get related category with product
    public function category(){
        return $this->belongsTo(Category::class,"category_id");
    }

    // Function to get related images for product 
    public function images(){
        return $this->morphMany(Media::class, "mediaable")->where("used_for", "product_image");
    }

    // Function to add image related to product 
    public function addProductImage($name){
        $this->images()->create(['used_for'=> "product_image",'name'=> $name]);
    }
}
