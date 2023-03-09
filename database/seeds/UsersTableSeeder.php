<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Darlinton Luis Siqueira',
            'email'    => 'darlinton2000@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
