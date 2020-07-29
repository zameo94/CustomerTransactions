<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $customers = Customer::all();

            return response($customers);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: Customer->index()'
            ], 500);
        }
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        try{
            return response($customer);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: Customer->show()'
            ], 500);
        }
    }

}
