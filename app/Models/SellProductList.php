<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProductList extends Model
{
    use HasFactory;

    public function productName(){
        return $this->belongsTo(BottleSize::class,'product_id');
    }
}
