<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adres extends Model
{
    protected $fillable = [
        'naam', 'adres'
    ];
}
