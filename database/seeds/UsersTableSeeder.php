<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name'     => 'Administrador',
            'email'    => 'admin@zamixerp.com',
            'password' => bcrypt('12345678')
        ],[
            'name'     => 'Felipe Carlos',
            'email'    => 'felipe@zamixerp.com',
            'password' => bcrypt('12345678')
        ],[
            'name'     => 'Matheus Gonçalves',
            'email'    => 'matheus@zamixerp.com',
            'password' => bcrypt('12345678')
        ],[
            'name'     => 'Jessica',
            'email'    => 'jessica@zamixerp.com',
            'password' => bcrypt('12345678')
        ],[
            'name'     => 'Vanessa Lopes',
            'email'    => 'vanessa@zamixerp.com',
            'password' => bcrypt('12345678')
        ]]);
    }
}
