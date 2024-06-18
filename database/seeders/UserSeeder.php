<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'username' => 'Traditour12',
                'email' => 'traditour@gmail.com',
                'password' => bcrypt('traditour'), 
                'role' => 'admin',
            ],
            [
                'username' => 'Traditour69',
                'email' => 'traditour69@gmail.com',
                'password' => bcrypt('traditour69'), 
                'role' => 'admin',
            ],
        ]);
    }
}


