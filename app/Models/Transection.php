<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;


    public function accountname(){
        return $this->belongsTo(Bank::class,'bankaccount_id');
    }

    public function bankaccountname(){
        return $this->belongsTo(BankAccount::class,'bankaccount_id');
    }
    




}
