<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5000),
        'currency' => $faker->randomElement($array = array ('£','$','€'))
    ];
});
