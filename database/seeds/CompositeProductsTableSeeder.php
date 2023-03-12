<?php

use App\Models\CompositeProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompositeProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('composite_products')->insert([[
            'name'       => 'Cesta Básica',
            'sule_price' => 25.00,
            'amount'     => 2,
            'product_id' => 3,
            'cost_price' => 3.90,
            'subtotal'   => 7.80
        ],[
            'name'       => 'Cesta Básica',
            'sule_price' => 25.00,
            'amount'     => 4,
            'product_id' => 4,
            'cost_price' => 1.80,
            'subtotal'   => 7.20
        ],[
            'name'       => 'Cesta Básica',
            'sule_price' => 25.00,
            'amount'     => 1,
            'product_id' => 2,
            'cost_price' => 3.00,
            'subtotal'   => 3.00
        ]]);
    }
}
