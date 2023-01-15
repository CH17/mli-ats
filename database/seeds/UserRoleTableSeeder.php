<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = App\Role::pluck('id')->toArray();
        
        App\User::all()->each(function ($user) use ($roles) { 
            
            DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => $roles[array_rand($roles)],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);             
        });
    }
}
