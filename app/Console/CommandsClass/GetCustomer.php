<?php

namespace App\Console\CommandsClass;

use App\Customer;
use App\CustomerTransaction;

class GetCustomer
{
    /**
     * @param null $customerId
     * @return array
     */
    public static function main($customerId = null)
    {
        if(isset($customerId))
        {
            $output = [];
            array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Del Customer Indicato ++++++++++++++++++++++++++++++++++++++++");
            array_push($output,Customer::whereId($customerId)->get());
            array_push($output,"+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

            return $output;
        } else {
            $output = [];
            array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutti i Customers ++++++++++++++++++++++++++++++++++++++++");
            array_push($output,Customer::all());
            array_push($output,"++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

            return $output;
        }
    }
}
