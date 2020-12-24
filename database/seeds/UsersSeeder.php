<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'      => 'root',
            'email'     => 'root@correo.com',
            'password'     => bcrypt('123456'),

        ]);
    }
}
