<?php

namespace Tests\Feature;

use App\CurrencyWebServer;
use Tests\TestCase;

class ManageCurrencyWebServerTest extends TestCase
{

    /**
     * @test
     */
    public function guest_can_view_index_currencies()
    {
        $currency = factory(CurrencyWebServer::class)->create();

        $this->get(route('index-currencies.index'))
            ->assertOk()
            ->assertSee($currency->value)
            //->assertSee($currency->currency)
        ;
    }
}
