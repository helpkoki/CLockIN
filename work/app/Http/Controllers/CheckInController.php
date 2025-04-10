<?php



namespace App\Http\Controllers;

use App\Models\CheckIn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        
        $checkIn = CheckIn::where('user_id', $user->id)
            ->where('date', $today)
            ->first();
            
        $checkInTimes = [
            '11' => ['start' => '11:00', 'end' => '11:10'],
            '13' => ['start' => '13:00', 'end' => '13:10'],
            '16' => ['start' => '16:00', 'end' => '16:10'],
        ];
        
        $currentTime = Carbon::now()->format('H:i');
        
        return view('check-ins.index', compact('checkIn', 'checkInTimes', 'currentTime'));
    }
    
    public function clockIn()
    {
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        $currentTime = Carbon::now();
        
        // Check if already clocked in today
        $checkIn = CheckIn::where('user_id', $user->id)
            ->where('date', $today)
            ->first();
            
        if ($checkIn) {
            return redirect()->route('check-ins.index')
                ->with('error', 'You have already clocked in today.');
        }
        
        // Create new check-in record
        CheckIn::create([
            'user_id' => $user->id,
            'date' => $today,
            'clock_in_time' => $currentTime->format('H:i:s'),
        ]);
        
        return redirect()->route('check-ins.index')
            ->with('success', 'Clocked in successfully at ' . $currentTime->format('H:i'));
    }
    
    public function checkIn($period)
    {
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        $currentTime = Carbon::now();
        
        // Find today's check-in record
        $checkIn = CheckIn::where('user_id', $user->id)
            ->where('date', $today)
            ->first();
            
        if (!$checkIn) {
            return redirect()->route('check-ins.index')
                ->with('error', 'You need to clock in first.');
        }
        
        // Define check-in windows
        $checkInWindows = [
            '11' => ['start' => Carbon::createFromTime(11, 0), 'end' => Carbon::createFromTime(11, 10)],
            '13' => ['start' => Carbon::createFromTime(13, 0), 'end' => Carbon::createFromTime(13, 10)],
            '16' => ['start' => Carbon::createFromTime(16, 0), 'end' => Carbon::createFromTime(16, 10)],
        ];
        
        // Validate period
        if (!isset($checkInWindows[$period])) {
            return redirect()->route('check-ins.index')
                ->with('error', 'Invalid check-in period.');
        }
        
        $window = $checkInWindows[$period];
        
        // Check if within check-in window
        if ($currentTime->between($window['start'], $window['end'])) {
            $checkIn->update([
                "check_in_{$period}" => $currentTime->format('H:i:s'),
                "check_in_{$period}_status" => 'completed'
            ]);
            
            return redirect()->route('check-ins.index')
                ->with('success', "Check-in for {$period}:00 completed successfully.");
        } else {
            return redirect()->route('check-ins.index')
                ->with('error', "It's not the check-in window for {$period}:00.");
        }
    }
    
    public function history()
    {
        $user = Auth::user();
        $checkIns = CheckIn::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->paginate(10);
            
        return view('check-ins.history', compact('checkIns'));
    }
    public function clockOut()
    {
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        $currentTime = Carbon::now();

        // Find today's check-in record
        $checkIn = CheckIn::where('user_id', $user->id)
            ->where('date', $today)
            ->first();

        if (!$checkIn) {
            return redirect()->route('check-ins.index')
                ->with('error', 'You need to clock in first before clocking out.');
        }

        if ($checkIn->clock_out_time) {
            return redirect()->route('check-ins.index')
                ->with('error', 'You have already clocked out today.');
        }

        // Update the record with clock out time
        $checkIn->update([
            'clock_out_time' => $currentTime->format('H:i:s')
        ]);

        return redirect()->route('check-ins.index')
            ->with('success', 'Clocked out successfully at ' . $currentTime->format('H:i'));
    }
}
