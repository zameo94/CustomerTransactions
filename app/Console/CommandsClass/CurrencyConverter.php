<?php

namespace App\Console\CommandsClass;

use App\CurrencyWebServer;
use App\CustomerTransaction;

class CurrencyConverter
{
    /**
     * @param null $customerId
     * @return array
     */
    public static function main($customerId = null)
    {
        $output = [];
        $customerTransactions = CustomerTransaction::whereCustomerId($customerId)->get();

        if(count($customerTransactions)){
            array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Delle Transazione Del Customer Indicato ++++++++++++++++++++++++++++++++++++++++");
            array_push($output, $customerTransactions);
            array_push($output,"++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

            return $output;
        }

        array_push($output, "Nessuna Transazione trovata per il Customer indicato");

        return $output;
    }

    /**
     * @param $primaryCurrency
     * @param $customerTransactions
     * @return array
     */
    public static function converter($primaryCurrency, $customerTransactions)
    {
        $currencyIndexChanges = CurrencyWebServer::all()->toArray();
        $output = [];

        foreach($customerTransactions as $customerTransaction){

            foreach($currencyIndexChanges as $currencyIndexChange){

                if(array_search($customerTransaction->currency, $currencyIndexChange)){
                    $customerCurrencyIndex = $currencyIndexChange['value'];
                    break;
                }
            }

            $customerTransaction->value = (1 / $customerCurrencyIndex) * $customerTransaction->value;

            $customerTransaction->currency = $primaryCurrency;

            array_push($output, $customerTransaction);
        }

        return $output;
    }
}
