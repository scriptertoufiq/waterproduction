<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function transectionCategory(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
