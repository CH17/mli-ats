<?php

use Illuminate\Database\Seeder;

class AudienceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AudienceType::class, 9)->create();
    }
}
