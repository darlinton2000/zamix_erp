<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(App\Models\Stock::class, function (Faker $faker) {
    $startDate = date('Y') . '-01-01'; // data de início do ano atual
    $endDate = date('Y') . '-12-31'; // data de fim do ano atual

    return [
        'product_id'   => Product::all()->random(),
        'amount_entry' => $this->faker->randomDigitNotNull(),
        'amount_exit'  => $this->faker->randomDigitNotNull(),
        'cost_price'   => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'sule_price'   => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'date_entry'   => $faker->dateTimeBetween($startDate, $endDate),
        'date_exit'    => $faker->dateTimeBetween($startDate, $endDate),
    ];
});
