<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        '\App\Console\Commands\ActivityStatusReport',
        '\App\Console\Commands\JacReport',
        '\App\Console\Commands\MofReport',
        '\App\Console\Commands\MissedRelease',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('report:activity-status')
            ->weekly()
            ->withoutOverlapping();
        $schedule->command('report:MOF')
            ->weekly()
            ->withoutOverlapping();
        $schedule->command('report:JAC')
            ->weekly()
            ->withoutOverlapping();

        $schedule->command('report:missed-activities')
            ->daily()
            ->withoutOverlapping();

        $schedule->command('queue:restart')
            ->everyFiveMinutes();

        $schedule->command('queue:work --daemon')
            ->everyMinute()
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
