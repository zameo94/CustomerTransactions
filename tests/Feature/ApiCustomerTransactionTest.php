<?php

namespace Tests\Feature;

use App\Customer;
use App\CustomerTransaction;
use Tests\TestCase;

class ApiCustomerTransactionTest extends TestCase
{
    /**
     * @test
     */
    public function guest_can_view_index_customers_transactions()
    {
        factory(Customer::class)->create();
        $customerTransactions = factory(CustomerTransaction::class)->create();

        $this->get(route('customers-transactions.index'))
            ->assertOk()
            ->assertSee($customerTransactions->value)
            //->assertSee($customer->currency)
        ;

        $this->get(route('customers-transactions.show', ['customerTransaction' => $customerTransactions]))
            ->assertOk()
            ->assertSee($customerTransactions->value)
            //->assertSee($customer->currency)
        ;
    }
}
