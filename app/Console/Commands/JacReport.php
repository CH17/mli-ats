<?php

namespace App\Console\Commands;

use App\Project;
use App\WeeklyJacReport;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class JacReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:JAC';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly report for JAC';

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
        Log::info("JAC Report Command is running...");

        try {

            $projects = Project::get();

            $jac13 = $projects->where('jac13', 1)->count();
            $jac14 = $projects->where('jac14', 1)->count();
            $jac17 = $projects->where('jac17', 1)->count();
            $jac18 = $projects->where('jac18', 1)->count();
            $jac19 = $projects->where('jac19', 1)->count();
            $jac23 = $projects->where('jac23', 1)->count();
            $jac24 = $projects->where('jac24', 1)->count();
            $jac25 = $projects->where('jac25', 1)->count();
            $total = $projects->count();
          

            $data['week'] = date('Y-m-d', strtotime(today()));

            $data['jac13'] = $jac13;
            $data['jac14'] = $jac14;
            $data['jac15'] = null;
            $data['jac16'] = null;
            $data['jac17'] = $jac17;
            $data['jac18'] = $jac18;
            $data['jac19'] = $jac19;
            $data['jac23'] = $jac23;
            $data['jac24'] = $jac24;
            $data['jac25'] = $jac25;
            $data['total'] = $total;
         

            WeeklyJacReport::create($data);

            Log::info("JAC Report Created Successfully.");
        } catch (Exception $e) {
            Log::info("Failed to create JAC Report.");
            Log::error($e->getMessage());
        }
    }
}
