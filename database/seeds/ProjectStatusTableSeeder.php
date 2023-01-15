<?php

use App\ProjectStatus;
use Illuminate\Database\Seeder;

class ProjectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Proposed',
            'New',
            'Planning',
            'Ready',
            'Active',
            'Analysis',
            'Audit',
            'Approved',
            'Closed',
        ];
        
        foreach($statuses as $status){
            ProjectStatus::insert([
                'name' => $status,            
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
