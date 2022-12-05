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
        //
        Commands\ListingUSDTCron::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call('App\Http\Controllers\Controller@cronScaledSaleHandleFunction')->everyThreeMinutes();
        $schedule->call('App\Http\Controllers\Controller@cronCheckOrder')->everyFourMinutes();
        $schedule->call('App\Http\Controllers\Controller@cronWithdraw')->everyFiveMinutes();
        $schedule->call('App\Http\Controllers\Controller@cronCheckWithdraw')->everyTwoMinutes();
        $schedule->call('App\Http\Controllers\Controller@cronLastStep')->everyFiveMinutes();

        $schedule->call('App\Http\Controllers\Controller@cronDailyWithdraw')->dailyAt('00:00');
        $schedule->call('App\Http\Controllers\Controller@handleFailedSuperLoads')->everyMinute();


        $schedule->call('App\Http\Controllers\Client\SellController@cronHandleFunction')->everyMinute();
        $schedule->call('App\Http\Controllers\Client\BuyController@cronHandleFunction')->everyMinute();

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
