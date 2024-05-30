<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=[
            'name'=>'student',
            'email'=>'student@gmail.com',
            'user_role'=>'user',
            'password'=>bcrypt('password'),
        ];

        User::create($user);

        
        $user=[
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'user_role'=>'admin',
            'password'=>bcrypt('password'),
            // password = $2y$12$X5sPs1.MBEuo3PsaFrZ8AuqNl1nCnUnAEa3bsvVjiXF/tjkCIh94C
        ];

        User::create($user);
    }
}
