<?php

use Illuminate\Database\Seeder;

class CurrencyWebServerTableSeeder extends Seeder
{
    /**
     * Oltre a creare Random i valori di ogni valuta in funzione della valua primaria indicata ($primaryCurrency),
     * essa stessa viene salvata con valore fissato ad 1,
     * in modo da poter scegliere quale valuta primaria si voglia senza intaccare il funzionamento del programma
     */
    public function run()
    {
        $currencies = \App\CurrencyWebServer::CURRENCY;
        $primaryCurrency = "€";

        foreach($currencies as $currency){
            if($currency === $primaryCurrency)
            {
                factory(App\CurrencyWebServer::class, 1)->create([
                    'value' => 1,
                    'currency' => $currency
                ]);
            } else{
                factory(App\CurrencyWebServer::class, 1)->create([
                    'currency' => $currency
                ]);
            }
        }
    }
}
