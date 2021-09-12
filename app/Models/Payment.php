<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function StaffData(){
        return $this->belongsTo(Staff::class,'staff_id');
    }

    public function ClientData(){
        return $this->belongsTo(Client::class,'client_id');
    }
}
