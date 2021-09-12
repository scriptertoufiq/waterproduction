<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterProduction extends Model
{
    use HasFactory;

    public function bottle()
    {
        return $this->belongsTo(BottleSize::class,'bottle_id');
    }
}
