<?php

namespace Tests\Feature;

use App\CustomerTransaction;
use App\Customer;
use Tests\TestCase;

class CommandCustomerTransactionsIndexTest extends TestCase
{
    /**
     * @test
     */
    public function it_has_customers_index_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\CustomerTransactionIndexCommand::class));
    }

    /**
     * @test
     */
    public function guest_can_view_index_customers()
    {
        factory(Customer::class)->create();
        factory(CustomerTransaction::class)->create();

        $this->artisan('customers:get')
            ->expectsOutput('++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutti i Customers ++++++++++++++++++++++++++++++++++++++++')
            //->expectsOutput(Customer::all())
            ->expectsOutput('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
            ->assertExitCode(0);
    }
}
