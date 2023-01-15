<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'ADMIN',
            'description' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => "DoA",
            'description' => 'Director of Accreditation',
            'created_at' => now(),
            'updated_at' => now()            
        ]);
        DB::table('roles')->insert([
            'name' => "ED",
            'description' => 'Executive Director',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => "PM",
            'description' => 'Project Manager',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
