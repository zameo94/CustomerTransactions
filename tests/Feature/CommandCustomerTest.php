<?php

namespace Tests\Feature;

use App\Customer;
use Tests\TestCase;

class CommandCustomerTest extends TestCase
{
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
    public function guest_can_view_index_customers()
    {
        factory(Customer::class)->create();

        $this->artisan('customers:get')
            ->expectsOutput('++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutti i Customers ++++++++++++++++++++++++++++++++++++++++')
            ->expectsOutput('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
            ->assertExitCode(0);
    }

    /**
     * @test
     */
    public function guest_can_view_show_customer()
    {
        $customer = factory(Customer::class)->create();

        $this->artisan('customers:get', ['--customer' => $customer->id])
            ->expectsOutput("++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Del Customer Indicato ++++++++++++++++++++++++++++++++++++++++")
            ->expectsOutput("+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++")
            ->assertExitCode(0);

        $customer->id = 100;

        $this->artisan('customers:get', ['--customer' => $customer->id])
            ->expectsOutput("Nessun Customer trovato per l'id indicato")
            ->assertExitCode(0);
    }
}
