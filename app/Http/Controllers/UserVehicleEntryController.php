<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserVehicleEntryRequest;
use App\Models\ParkingSpace;
use App\Models\UserVehicle;
use App\Models\UserVehicleEntry;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use thiagoalessio\TesseractOCR\TesseractOCR;

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
        // dd($entry);
        return view('backend.vehicle-entries-one', compact('entry'));
    }

    public function delete(Request $request)
    {
        UserVehicleEntry::destroy($request->entry);
        return redirect(route('vehicle.entries'));
    }

    public function add(Request $request)
    {
        if ($request->method() == "GET") {
            $parkingSpaces = ParkingSpace::all();
            return view('guest.vehicle-entry-add', compact('parkingSpaces'));
        }

        $request->validate([
            'driver_name' => ['required'],
            'parking_space' => ['required', Rule::exists('parking_spaces', 'id')],
            'registration_number' => ['required', Rule::exists('user_vehicles', 'vehicle_registration_number')]
        ]);

        UserVehicleEntry::create([
            'user_vehicle_id' => UserVehicle::where('vehicle_registration_number', $request->input('registration_number'))->first()->id,
            'status' => 'IN',
            'parking_space_id' => ParkingSpace::find($request->input('parking_space'))->id,
            'driver_name' => $request->input('driver_name')
        ]);

        return response()->redirectTo(route('vehicle.entry.new'))->with('success', 'Vehicle entry added successfully');


    }

    //API ROUTES

    public function entry(Request $request)
    {

        if ($request->method() === "GET") {
            return response()->view('guest.vehicle-check');
        } else {

            try {

                $registrationNumber = $request->input('vehicle_registration_number');

                $vehicle = UserVehicle::where('vehicle_registration_number', $registrationNumber)->firstOrFail();

                $entry = $vehicle->entries()->latest()->first();

                if (!$entry or $entry->status === "OUT") {
                    return response()->redirectGuest(route('vehicle.entry.new'))->with('number', $registrationNumber);
                }

                return response()->view('guest.vehicle-entry-view', compact('entry'));
            } catch (ModelNotFoundException $e) {


                return back()->with(['number' => $registrationNumber, 'vehicle' => 'not found', 'messge' => 'Vehicle with registration number ' . $registrationNumber . ' NOT FOUND']);
            } catch (\Exception $e) {
                // Log or handle the exception appropriately
                return response()->json(['success' => false, 'data' => "Error occurred while retrieving entry"], 500);
            }
        }
    }


    public function store(NewUserVehicleEntryRequest $request)
    {
        try {

            $space = ParkingSpace::findOrFail($request->input('space'));
            $vehicle = UserVehicle::where('vehicle_registration_number', $request->input('vehicle'))->firstOrFail();

            $vehicle->entries()->create([
                'status' => "IN",
                'parking_space_id' => $space->id,
                'driver_name' => $request->input('driver')
            ]);

            return response()->json(['success' => true, 'data' => []]);

        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'data' => "Parking space or vehicle not found"], 404);
        } catch (\Exception $e) {
            // Log or handle the exception appropriately
            return response()->json(['success' => false, 'data' => "Error occurred while saving entry"], 500);
        }
    }



    public function update(Request $request)
    {

        $entryId = $request->id;

        if($entryId) {
            $entry = UserVehicleEntry::find($entryId);
            $entry->update(['status' => 'OUT', 'time_out' => now()]);
        }

       return response()->redirectTo(route('vehicle.entry'));
    }

    public function check(Request $request)
    {
        if ($request->method() === "GET") {
            return response()->view('guest.vehicle-check');
        } else if ($request->method() === "POST") {
            $request->validate([
                'vehicle_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Get the uploaded image
            $imagePath = $request->file('vehicle_image')->path();

            // Use Tesseract OCR to extract text
            $text = (new TesseractOCR($imagePath))->run();

            // Return the extracted text
            dd($text);

            // $request->dd();
        }
    }
}
