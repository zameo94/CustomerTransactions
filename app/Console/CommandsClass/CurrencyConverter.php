<?php

namespace App\Console\CommandsClass;

use App\CurrencyWebServer;
use App\CustomerTransaction;

class CurrencyConverter
{
    /**
     * @param null $customerId
     * @return mixed
     */
    public static function main($customerId = null)
    {
        $customerTransactions = CustomerTransaction::whereCustomerId($customerId)->get();

        $customerTransactions = self::converter('€', $customerTransactions);

        return $customerTransactions;
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

            $customerTransaction->value =

            (1 / $customerCurrencyIndex) * $customerTransaction->value
            ;

            $customerTransaction->currency = $primaryCurrency;

            array_push($output, $customerTransaction);

        }

        return $output;
    }
}
