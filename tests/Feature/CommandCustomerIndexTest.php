<?php

namespace Tests\Feature;

use App\Customer;
use Tests\TestCase;

class CommandCustomerIndexTest extends TestCase
{
    /**
     * @test
     */
    public function it_has_customers_index_command()
    {
       $this->assertTrue(class_exists(\App\Console\Commands\CustomerIndexCommand::class));
    }

    /**
     * @test
     */
    public function guest_can_view_index_customers()
    {
        factory(Customer::class)->create();

        $this->artisan('customers:get')
            ->expectsOutput('++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutti i Customers ++++++++++++++++++++++++++++++++++++++++')
            ->expectsOutput(Customer::all())
            ->expectsOutput('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
            ->assertExitCode(0);
    }
}
