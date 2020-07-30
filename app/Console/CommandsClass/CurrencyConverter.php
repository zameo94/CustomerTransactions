<?php

namespace App\Console\CommandsClass;

use App\CustomerTransaction;

class CurrencyConverter
{
    /**
     * @param null $customerId
     * @return mixed
     */
    public static function main($customerId = null)
    {
        return CustomerTransaction::whereCustomerId($customerId)->get();
    }
}
