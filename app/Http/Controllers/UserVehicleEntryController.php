<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserVehicleEntryRequest;
use App\Models\ParkingSpace;
use App\Models\UserVehicle;
use App\Models\UserVehicleEntry;
use Illuminate\Http\Request;

class UserVehicleEntryController extends Controller
{
    public function index()
    {
        $entries = UserVehicleEntry::paginate(6);
        return view('backend.vehicle-entries-all', compact('entries'));
    }

    public function show(Request $request)
    {
        $entry = UserVehicleEntry::find($request->entry);
        return view('backend.vehicle-entries-one', compact('entry'));
    }

    public function delete(Request $request)
    {
        UserVehicleEntry::destroy($request->entry);
        return redirect(route('vehicle.entries'));
    }

    //API ROUTES

    public function entry(Request $request)
    {
        $vehicle = UserVehicle::where('vehicle_registration_number', $request->entry)->first();
        if ($vehicle) {
            $entry = UserVehicleEntry::whereBelongsTo($vehicle, 'vehicle')->latest()->first();

            if ($entry) {
                return response()->json(['success' => true, 'data' => $entry]);
            }
        }

        return response()->json(['success' => false, 'data' => "Entry for vehicle with plate number " . $request->vehicle . " NOT FOUND"], 404);
    }

    public function store(NewUserVehicleEntryRequest $request)
    {
        // $request->validated();

        $space = ParkingSpace::find($request->get('space'));
        $vehicle = UserVehicle::where('vehicle_registration_number', $request->get('vehicle'))->first();

        $newEntry = UserVehicleEntry::create([
            'user_vehicle_id' => $vehicle->id,
            'status' => "IN",
            'parking_space_id' => $space->id,
            'driver_name' => $request->get('driver')
        ]);

        if ($newEntry) {
            return response()->json(['success' => true, 'data' => []]);
        }
        return response()->json(['success' => false, 'data' => "Error occurred while saving entry"], 500);
    }

    public function exit(Request $request)
    {

        $vehicle = UserVehicle::where('vehicle_registration_number', $request->get('vehicle'))->first();
        if ($vehicle) {
            $entry = UserVehicleEntry::whereBelongsTo($vehicle, 'vehicle')->latest()->first();

            if ($entry) {
                $entry->update(['status' => "OUT"]);
                $entry->save();

                return response()->json(['success' => true, 'data' => []]);
            } else {
                return response()->json(['success' => false, 'data' => "This vehicle with plate number " . $request->get('vehicle') . " not found"], 500);
            }
        }
        return response()->json(['success' => false, 'data' => "Error occurred while saving entry"], 500);
    }
}
