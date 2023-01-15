<?php

namespace App\Console\Commands;

use App\Project;
use App\WeeklyMofReport;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MofReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:MOF';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly report for MOF';

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
        Log::info("MOF Report Command is running...");

        try {

            $projects = Project::get();

            $expired_but_active = $projects->where('expiration_date', '<',  today())->where('status_id', 5)->count();
            $analysis = $projects->where('status_id', 6)->count();
            $total_expired = $projects->where('expiration_date', '<',  today())->count();
            $one_pager_attach4 = $projects->where('has_attachment_4', 1)->count();
            $income_report_attach6 = $projects->where('has_attachment_6', 1)->count();

            $data['week'] = date('Y-m-d', strtotime(today()));

            $data['expired_but_active'] = $expired_but_active;
            $data['analysis'] = $analysis;
            $data['total_expired'] = $total_expired;
            $data['one_pager_produced'] = null;
            $data['one_pager_in_route'] = null;
            $data['one_pager_attach4'] = $one_pager_attach4;
            $data['mof_uploaded'] = null;
            $data['participation_uploaded'] = null;
            $data['income_report_attach6'] = $income_report_attach6;

            WeeklyMofReport::create($data);

            Log::info("MOF Report Created Successfully.");
        } catch (Exception $e) {
            Log::info("Failed to create MOF Report.");
            Log::error($e->getMessage());
        }
    }
}
