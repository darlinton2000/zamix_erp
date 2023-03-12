<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name'       => $this->faker->name(30),
        'cost_price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'sule_price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'amount'     => $this->faker->randomDigitNotNull(),
    ];
});
