<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'email','mobile','company',
    ];

    public function company()
    {
        return $this->belongsTo(Comapny::class, 'company','id');
    }
    
}
