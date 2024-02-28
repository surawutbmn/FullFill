<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert a default admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'sa@gmail.com',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert other users as needed
    }
}
