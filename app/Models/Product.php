<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function staffName(){
        return $this->belongsTo(Staff::class,'staff_id');
    }


    public function production(){
        return $this->belongsTo(WaterProduction::class,'production_id');
    }



}
