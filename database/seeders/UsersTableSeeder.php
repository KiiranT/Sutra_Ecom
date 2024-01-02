<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [
            [
                'name' => 'Munal Admin',
                'email' => 'admin@munalstore.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active'
            ],
            [
                'name' => 'Customer One',
                'email' => 'customerone@munalstore.com',
                'password' => Hash::make('customerone123'),
                'role' => 'customer',
                'status' => 'active'
            ]
        ];

        DB::table('users')->insert($user_data);
    }
}
