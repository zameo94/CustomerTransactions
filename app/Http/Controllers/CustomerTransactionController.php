<?php

namespace App\Http\Controllers;

use App\CustomerTransaction;

class CustomerTransactionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $customers = CustomerTransaction::all();

            return response($customers);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: CustomerTransaction->index()'
            ], 500);
        }
    }

    /**
     * @param CustomerTransaction $customerTransaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(CustomerTransaction $customerTransaction)
    {
        try{
            return response($customerTransaction);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: CustomerTransaction->show()'
            ], 500);
        }
    }
}
