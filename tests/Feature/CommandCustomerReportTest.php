<?php

namespace Tests\Feature;

use App\Customer;
use Tests\TestCase;

class CommandCustomerReportTest extends TestCase
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
    public function guest_can_view_customers_report()
    {
        $customer = factory(Customer::class)->create();

        $this->artisan('customer:report', ['customer-id' => $customer->id])
            ->expectsOutput("++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Delle Transazione Del Customer Indicato ++++++++++++++++++++++++++++++++++++++++")
            //->expectsOutput(Customer::all())
            ->expectsOutput("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++")
            ->assertExitCode(0);
    }
}
