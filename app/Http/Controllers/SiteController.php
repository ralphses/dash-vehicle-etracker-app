<?php

namespace App\Http\Controllers;

use App\Models\UserVehicle;
use App\Models\UserVehicleEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SiteController extends Controller
{
    public function index()
    {
        $stats = $this->getStats();
        $recentEntries = $this->getRecentEntries(5);

        $info = ['stats' => $stats, 'recent' => $recentEntries];

        return view('dashboard', compact('info'));
    }

    private function getStats()
    {
        $userCount = $this->getUsersCount();
        $vehicleCount = $this->getVehicleCount();
        $recentEntryCount = $this->getRecentEntryCount();

        return [
            'userCount' => $userCount,
            'vehicleCount' => $vehicleCount,
            'recentEntryCount' => $recentEntryCount
        ];
    }

    private function getUsersCount()
    {
        return UserVehicle::distinct('full_name')->count();
    }

    private function getVehicleCount()
    {
        return UserVehicle::count();
    }

    private function getRecentEntryCount()
    {
        return $this->getRecentEntries(5)->count();
    }

    private function getRecentEntries($limit)
    {
        $today = Carbon::today();
        return UserVehicleEntry::whereDate('created_at', $today)->take($limit)->get();
    }
}
