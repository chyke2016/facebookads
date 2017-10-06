<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashout extends Model
{

protected $fillable = [
        'name', 'email', 'amount','phone','paid'
    ];

}
