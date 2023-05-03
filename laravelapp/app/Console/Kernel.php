<?php

namespace App\Console;

use App\Mail\ProfileImageNotification;
use App\Models\Client;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $clients = Client::where('profile_image', '')->get();
            foreach ($clients as $client) {
                Mail::to($client->email)->send(new ProfileImageNotification($client));
            }
        })->cron('0 0 */3 * *');
        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
