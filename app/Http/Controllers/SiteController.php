<?php

namespace App\Http\Controllers;

use App\Models\UserVehicle;
use App\Models\UserVehicleEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SiteController extends Controller
{
    public function index() {
        
        //get stats
        $stats = $this->getStats();

        //get recent entries
        $recentEntries = $this->getRecentEntries();

        $info = ['stats' => $stats, 'recent' => $recentEntries];

        return view('dashboard', compact('info'));
    }

    private function getStats() {

        $userCount = $this->getUsers();
        $vehicleCount = $this->getVehicleCount();
        $recentEntryCount = $this->getRecentEntryCount();

        return [
            'userCount' => $userCount,
            'vehicleCount' => $vehicleCount,
            'recentEntryCount' => $recentEntryCount
        ];
    }

    private function getUsers() {
        return UserVehicle::distinct('full_name')->count();
    }
    
    private function getVehicleCount() {
        return UserVehicle::all()->count();
    }

    private function getRecentEntryCount() {
        return $this->getRecentEntries()->count();
    }

    private function getRecentEntries() {
        $today = Carbon::today();
        return UserVehicleEntry::whereDate('created_at', $today)->get()->take(5);
    }
}
