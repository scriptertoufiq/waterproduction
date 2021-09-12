<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    use HasFactory;

    public function DestroyeBottle(){
        return $this->hasMany(DestroyedBottle::class,'bottle_id');
    }

    public function bottle(){
        return $this->belongsTo(BottleSize::class,'size_id');
    }
}
