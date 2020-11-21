<?php

namespace Tests\Feature;

use App\Customer;
use App\CustomerTransaction;
use Tests\TestCase;

class CommandCustomerReportTest extends TestCase
{
    private $console;

    /**
     * @test
     */
    public function it_has_customers_index_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\CustomerReportCommand::class));
    }

    /**
     * @test
     */
    public function guest_can_view_customers_report()
    {
        $customer = factory(Customer::class)->create();
        factory(CustomerTransaction::class)->create();

        $this->artisan('customer:report', ['customer-id' => $customer->id])
            ->expectsOutput("++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Delle Transazione Del Customer Indicato ++++++++++++++++++++++++++++++++++++++++")
            ->expectsOutput("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++")
            ->assertExitCode(0);

        $customer->id = 10;

        $this->artisan('customer:report', ['customer-id' => $customer->id])
            ->expectsOutput("Nessuna Transazione trovata per il Customer indicato");


    }
}
