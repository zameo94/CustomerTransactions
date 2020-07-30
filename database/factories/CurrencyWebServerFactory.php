<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CurrencyWebServer;
use Faker\Generator as Faker;

$factory->define(CurrencyWebServer::class, function (Faker $faker) {
    return [
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2),
        'currency' => $faker->randomElement(['£', '$', mb_convert_encoding('€', 'UTF-8')])
    ];
});
