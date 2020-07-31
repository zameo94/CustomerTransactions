<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     *
     */
    public function transactions()
    {
        $this->hasMany(CustomerTransaction::class);
    }
}
