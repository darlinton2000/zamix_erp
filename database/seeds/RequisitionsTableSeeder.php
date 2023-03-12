<?php

use App\Models\Requisition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisitions')->insert([[
            'user_id'         => 2,
            'product_id'      => 3,
            'amount'          => 20,
            'withdrawal_date' => '2023-03-13'
        ],[
            'user_id'         => 4,
            'product_id'      => 1,
            'amount'          => 10,
            'withdrawal_date' => '2023-03-13'
        ],[
            'user_id'         => 2,
            'product_id'      => 2,
            'amount'          => 20,
            'withdrawal_date' => '2023-03-14'
        ],[
            'user_id'         => 4,
            'product_id'      => 3,
            'amount'          => 5,
            'withdrawal_date' => '2023-03-14'
        ]]);
    }
}
