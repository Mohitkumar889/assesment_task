<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    protected $appends = ["image_url"];
    public static $product_folder = "public/product/images";


    public function getImageUrlAttribute(){
        return $this->name ? url(static::$product_folder, $this->name) : "";
    }
}
