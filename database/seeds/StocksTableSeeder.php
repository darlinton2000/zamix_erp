<?php

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([[
            'product_id'    => 3,
            'amount_entry'  => 50,
            'amount_exit'   => null,
            'cost_price'    => 3.90,
            'sule_price'    => 5.00,
            'date_entry'    => '2023-03-05',
            'date_exit'     => null
        ],[
            'product_id'    => 2,
            'amount_entry'  => 30,
            'amount_exit'   => null,
            'cost_price'    => 3.00,
            'sule_price'    => 4.50,
            'date_entry'    => '2023-02-02',
            'date_exit'     => null
        ],[
            'product_id'    => 3,
            'amount_entry'  => 10,
            'amount_exit'   => 5,
            'cost_price'    => 3.90,
            'sule_price'    => 5.00,
            'date_entry'    => '2023-03-08',
            'date_exit'     => '2023-03-09'
        ]]);
    }
}
