<?php

namespace App\Console\Commands;

use App\Project;
use App\WeeklyStatusReport;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ActivityStatusReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:activity-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly report for activity status.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("Activity Status Report Command is running...");

        try {

            $projects = Project::get();

            $proposed = $projects->where('status_id', 1)->count();
            $new = $projects->where('status_id', 2)->count();
            $planning = $projects->where('status_id', 3)->count();
            $ready = $projects->where('status_id', 4)->count();
            $active = $projects->where('status_id', 5)->count();
            $analysis = $projects->where('status_id', 6)->count();
            $audit = $projects->where('status_id', 7)->count();
            $approved = $projects->where('status_id', 8)->count();
            $total = $proposed + $new + $planning + $ready + $active + $analysis + $audit + $approved;

            $closed = $projects->where('status_id', 9)->count();

            $data['week'] = date('Y-m-d', strtotime(today()));

            $data['proposed'] = $proposed;
            $data['new'] = $new;
            $data['planning'] = $planning;
            $data['ready'] = $ready;
            $data['active'] = $active;
            $data['analysis'] = $analysis;
            $data['audit'] = $audit;
            $data['approved'] = $approved;
            $data['total'] = $total;
            $data['closed'] = $closed;

            WeeklyStatusReport::create($data);

            Log::info("Activity Status Report Created Successfully.");
        } catch (Exception $e) {
            Log::info("Failed to create Activity Status Report.");
            Log::error($e->getMessage());
        }
    }
}
