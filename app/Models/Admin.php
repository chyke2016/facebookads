<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name', 'email', 'uploads','annoncements','url','created_at','updated_at',
    ];
}

