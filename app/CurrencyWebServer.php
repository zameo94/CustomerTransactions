<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyWebServer extends Model
{
    public const CURRENCY = ['£', '$', '€'];

    protected $fillable = [
        'value',
        'currency',
    ];

}
