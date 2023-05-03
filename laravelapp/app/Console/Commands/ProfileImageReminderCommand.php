<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;
use App\Notifications\ProfileImageReminder;

class ProfileImageReminderCommand extends Command
{
    protected $signature = 'reminder:profile-image';

    protected $description = 'Send reminder to clients to drop passport photograph with Law Firm X if profile image is not available.';

    public function handle()
    {
        $clients = Client::where('profile_image', '')->get();

        foreach ($clients as $client) {
            $client->notify(new ProfileImageReminder());
        }
    }
}
