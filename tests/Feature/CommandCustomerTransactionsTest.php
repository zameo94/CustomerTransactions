<?php

namespace Tests\Feature;

use App\CustomerTransaction;
use App\Customer;
use Tests\TestCase;

class CommandCustomerTransactionsTest extends TestCase
{
    /**
     * @test
     */
    public function it_has_transactions_index_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\CustomerTransactionCommand::class));
    }

    /**
     * @test
     */
    public function guest_can_view_index_transactions()
    {
        factory(Customer::class)->create();
        factory(CustomerTransaction::class)->create();

        $this->artisan('customers:get')
            ->expectsOutput('++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutte le Transazioni ++++++++++++++++++++++++++++++++++++++++')
            //->expectsOutput(Customer::all())
            ->expectsOutput('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
            ->assertExitCode(0);
    }

    /**
     * @test
     */
    public function guest_can_view_show_transaction()
    {
        factory(Customer::class)->create();
        $transaction = factory(CustomerTransaction::class)->create();

        $this->artisan('customers:get', ['transaction' => $transaction->id])
            ->expectsOutput("++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Della Transazione  Indicata ++++++++++++++++++++++++++++++++++++++++")
         //->expectsOutput(Customer::all())
            ->expectsOutput("+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++")
            ->assertExitCode(0);
    }
}
