<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
 
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            $data = array('content' => 'tak', 'author' => 1, 'post_id' => Post::all()->random()->id);
            $request = Http::post("http://127.0.0.1:8000/api/comment", $data);
        })->cron('*/36 * * * *');

        $schedule->call(function() {
            $data = array('title' => 'Autopost', 'content' => 'For user update', 'author' => 1 );
            $request = Http::post("http://127.0.0.1:8000/api/post", $data);

        })->daily();
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
