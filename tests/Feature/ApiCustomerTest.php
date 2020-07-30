<?php

namespace Tests\Feature;

use App\Customer;
use Tests\TestCase;

class ApiCustomerTest extends TestCase
{
    /**
     * @test
     */
    public function guest_can_view_index_customers()
    {
        $customer = factory(Customer::class)->create();

        $this->get(route('customers.index'))
            ->assertOk()
            ->assertSee($customer->name);

        $this->get(route('customers.show', ['customer' => $customer]))
            ->assertOk()
            ->assertSee($customer->name);
    }
}
