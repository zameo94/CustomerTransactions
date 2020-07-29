<?php

namespace App\Http\Controllers;

use App\CurrencyWebServer;
use Illuminate\Http\Request;

class CurrencyWebServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $indexCurrencies = CurrencyWebServer::all()->pluck('value', 'currency');

            return response($indexCurrencies);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CurrencyWebServer  $currencyWebServer
     * @return \Illuminate\Http\Response
     */
    public function show(CurrencyWebServer $currencyWebServer)
    {
        //
    }
}
