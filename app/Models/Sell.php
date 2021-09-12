<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    public function clientName(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function staffName(){
        return $this->belongsTo(Staff::class,'staff_id');
    }
}
