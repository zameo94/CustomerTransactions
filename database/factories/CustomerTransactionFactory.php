<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\CustomerTransaction;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

/**
 * Il 'customer_id' viene assegnato con valore randomico preso dai reali Id Customer presenti nel db,
 * in caso non ce ne fossero gli viene assegnato un Customer appena creato
 */
$factory->define(CustomerTransaction::class, function (Faker $faker) {
    return [
        'customer_id' => Arr::random(Customer::all()->pluck('id')->toArray()) ??
            factory(Customer::class)->create(),
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5000),
        'currency' => $faker->randomElement($array = array ('£','$',mb_convert_encoding('€', 'UTF-8')))
    ];
});
