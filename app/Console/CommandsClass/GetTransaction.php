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
        $output = [];

        if(isset($transactionId))
        {

            $transaction = CustomerTransaction::whereId($transactionId)->get();
            if(count($transaction)) {
                array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Della Transazione Indicata ++++++++++++++++++++++++++++++++++++++++");
                array_push($output, $transaction);
                array_push($output, "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

                return $output;
            }

            array_push($output, "Nessuna Transazione trovato per l'id indicato");

            return $output;

        } else {
            array_push($output, "++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutte le Transazioni ++++++++++++++++++++++++++++++++++++++++");
            array_push($output,CustomerTransaction::all());
            array_push($output,"+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

            return $output;
        }
    }
}
