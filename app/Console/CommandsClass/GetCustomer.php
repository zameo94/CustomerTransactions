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
    public function main($customerId = null)
    {
        $output = [];

        if(isset($customerId))
        {
            $customer = Customer::whereId($customerId)->get();
            if(count($customer)){
                array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Del Customer Indicato ++++++++++++++++++++++++++++++++++++++++");
                array_push($output, $customer);
                array_push($output,"+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

                return $output;
            }

            array_push($output, "Nessun Customer trovato per l'id indicato");

            return $output;


        } else {
            array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutti i Customers ++++++++++++++++++++++++++++++++++++++++");
            array_push($output,Customer::all());
            array_push($output,"++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

            return $output;
        }
    }
}
