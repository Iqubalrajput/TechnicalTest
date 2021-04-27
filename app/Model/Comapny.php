<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comapny extends Model
{
    protected $fillable = [
        'name', 'email', 'image','website',
    ];
}
