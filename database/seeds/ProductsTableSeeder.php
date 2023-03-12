<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([[
            'name'       => 'Refrigerante Lata 350ml',
            'cost_price' => 1.50,
            'sule_price' => 6.00,
            'amount'     => 150
        ],[
            'name'       => 'Café pct 500gr',
            'cost_price' => 3.85,
            'sule_price' => 4.50,
            'amount'     => 50
        ],[
            'name'       => 'Arroz Branco tipo 1 pct 5kg',
            'cost_price' => 3.90,
            'sule_price' => 5.00,
            'amount'     => 150
        ],[
            'name'       => 'Feijão Preto tipo 1 pct 1kg',
            'cost_price' => 1.80,
            'sule_price' => 2.90,
            'amount'     => 70
        ],[
            'name'       => 'Coca-Cola 2litros',
            'cost_price' => 5.00,
            'sule_price' => 9.00,
            'amount'     => 30
        ],[
            'name'       => 'Açucar União 2kg',
            'cost_price' => 5.20,
            'sule_price' => 8.30,
            'amount'     => 70
        ],[
            'name'       => 'Macarrão Renata 5kg',
            'cost_price' => 3.00,
            'sule_price' => 7.00,
            'amount'     => 90
        ]]);
    }
}
