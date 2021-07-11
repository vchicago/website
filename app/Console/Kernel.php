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
        '\App\Console\Commands\FetchMetar',
        '\App\Console\Commands\OnlineControllerUpdate',
        '\App\Console\Commands\RosterUpdate',
        '\App\Console\Commands\EventEmails',
        '\App\Console\Commands\ARTCCOverflights',
        '\App\Console\Commands\RosterRemovalWarn',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('SoloCerts:UpdateSoloCerts')->daily();
        $schedule->command('RosterUpdate:UpdateRoster')->hourly();
//        $schedule->command('Overflights:GetOverflights')->everyFiveMinutes();
        $schedule->command('Weather:UpdateWeather')->everyFiveMinutes();
//        $schedule->command('OnlineControllers:GetControllers')->everyMinute();
        $schedule->command('Event:SendEventReminder')->dailyAt('00:30')->timezone('America/Chicago');
        $schedule->command('RosterRemoval:Warning')->monthlyOn('20', '00:30')->timezone('America/Chicago');
		$schedule->command('RosterRemoval:WarningFinal')->dailyAt('00:30')->when(function () {
							return \Carbon\Carbon::now()->endOfMonth()->isToday();});
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
