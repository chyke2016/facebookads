<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','url','upload','bankname','accountname','accountno','confirmed','balance','referal','referal_balance','created_at','updated_at',
    ];
}


