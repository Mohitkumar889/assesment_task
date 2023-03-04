<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    

    protected $casts = [
        // 'created_at' => 'datetime: d M, Y h:i a',
        // 'updated_at' => 'datetime: d M, Y h:i a'
    ];
}
