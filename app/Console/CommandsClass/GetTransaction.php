<?php

namespace App\Console\CommandsClass;

use App\CustomerTransaction;

class GetTransaction
{
    /**
     * @param null $transactionId
     * @return array
     */
    public static function main($transactionId = null)
    {
        if(isset($transactionId))
        {
            $output = [];
            array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Della Transazione  Indicata ++++++++++++++++++++++++++++++++++++++++");
            array_push($output,CustomerTransaction::whereId($transactionId)->get());
            array_push($output,"+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

            return $output;
        } else {
            $output = [];
            array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutte le Transazioni ++++++++++++++++++++++++++++++++++++++++");
            array_push($output,CustomerTransaction::all());
            array_push($output,"+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

            return $output;
        }
    }
}
