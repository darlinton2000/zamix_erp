<?php

use App\Models\CompositeProduct;
use App\Models\Product;
use App\Models\Requisition;
use App\Models\Stock;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Seeds
        /* $this->call([
            UsersTableSeeder::class,
            ProductsTableSeeder::class,
            RequisitionsTableSeeder::class,
            CompositeProductsTableSeeder::class,
            StocksTableSeeder::class
        ]); */

        // Factories
        factory(User::class, 5)->create();
        factory(Product::class, 61)->create();
        factory(CompositeProduct::class, 26)->create();
        factory(Requisition::class, 13)->create();
        factory(Stock::class, 44)->create();
    }
}
