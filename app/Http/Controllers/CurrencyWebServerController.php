<?php

namespace App\Http\Controllers;

use App\CurrencyWebServer;

class CurrencyWebServerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $indexCurrencies = CurrencyWebServer::all();

            return response($indexCurrencies);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request'
            ], 500);
        }

    }

    /**
     * @param CurrencyWebServer $indexCurrency
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(CurrencyWebServer $indexCurrency)
    {
        try{
            return response($indexCurrency);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request'
            ], 500);
        }
    }
}
