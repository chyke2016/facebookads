<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertizer extends Model
{
   protected $fillable = [
        'name', 'email', 'company_name','phone','url','upload','confirmed','no_of_shares','share_recorded','created_at','updated_at',
    ];
}


