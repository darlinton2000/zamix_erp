<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(App\Models\CompositeProduct::class, function (Faker $faker) {
    return [
        'name'       => $this->faker->name(30),
        'sule_price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'amount'     => $this->faker->randomDigitNotNull(),
        'product_id' => Product::all()->random(),
        'cost_price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'subtotal'   => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
    ];
});
