<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assign roles to users
        DB::table('user_roles')->insert([
            ['user_id' => 1, 'role_id' => 3], // Assign admin role to the first user
            // Add more user-role assignments as needed
        ]);
    }
}
