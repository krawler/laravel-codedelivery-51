<?php

namespace CodeDelivery\Console;

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
<<<<<<< HEAD
        Commands\Inspire::class,
=======
        // Commands\Inspire::class,
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
<<<<<<< HEAD
        $schedule->command('inspire')
                 ->hourly();
=======
        // $schedule->command('inspire')
        //          ->hourly();
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    }
}
