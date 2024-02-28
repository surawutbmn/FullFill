<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert default roles
        DB::table('roles')->insert([
            ['name' => 'seller', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'buyer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // You can add more roles as needed
    }
}
