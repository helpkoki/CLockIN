<?php

namespace App\Console\Commands;

use App\Models\CheckIn;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateMissedCheckIns extends Command
{
    protected $signature = 'check-ins:update-missed';

    protected $description = 'Update missed check-ins after the window has passed';

    public function handle()
    {
        $today = Carbon::today()->format('Y-m-d');
        $currentTime = Carbon::now();

        // Define check-in windows end times
        $checkInEndTimes = [
            '11' => Carbon::createFromTime(11, 10),
            '13' => Carbon::createFromTime(13, 10),
            '16' => Carbon::createFromTime(16, 10),
        ];

        // Loop through each window to check for missed check-ins
        foreach ($checkInEndTimes as $period => $endTime) {
            if ($currentTime->greaterThan($endTime)) {
                CheckIn::where('date', $today)
                    ->where("check_in_{$period}_status", 'pending')
                    ->update(["check_in_{$period}_status" => 'missed']);

                $this->info("Updated missed check-ins for {$period}:00 period.");
            }
        }

        return 0;
    }
}