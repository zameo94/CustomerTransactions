<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    protected $fillable = [
        'value',
        'currency',
        'created_at'
    ];

    /**
     *
     */
    public function customer()
    {
        $this->belongsTo(Customer::class);
    }
}
