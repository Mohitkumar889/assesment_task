<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    protected $appends = ["image_url"]; //to append key in media object
    public static $product_folder = "public/product/images";

    // Function to get image url for product image
    public function getImageUrlAttribute(){
        return $this->name ? url(static::$product_folder, $this->name) : "";
    }
}
