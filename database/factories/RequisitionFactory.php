<?php

use App\Models\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Requisition::class, function (Faker $faker) {
    $startDate = date('Y') . '-01-01'; // data de início do ano atual
    $endDate = date('Y') . '-12-31'; // data de fim do ano atual

    return [
        'user_id'         => User::all()->random(),
        'product_id'      => Product::all()->random(),
        'amount'          => $this->faker->randomDigitNotNull(),
        'withdrawal_date' => $faker->dateTimeBetween($startDate, $endDate),
    ];
});
