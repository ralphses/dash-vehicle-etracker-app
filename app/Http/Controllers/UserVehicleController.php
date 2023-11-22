<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRegistrationRequest;
use App\Models\UserVehicle;
use Illuminate\Http\Request;

class UserVehicleController extends Controller
{

    public function index()
    {
        $vehicles = UserVehicle::paginate(15);
        return view('backend.vehicle-all', compact('vehicles'));
    }
    public function create()
    {
        return view("guest.vehicle.register");
    }

    public function show(Request $request)
    {
        $vehicle = UserVehicle::find($request->vehicle);
        return view('backend.vehicles-one', compact('vehicle'));
    }

    public function delete(Request $request)
    {
        UserVehicle::destroy($request->vehicle);
        return redirect(route('vehicles.all'));
    }

    public function store(VehicleRegistrationRequest $request)
    {
        $validate = $request->validated();

        // If validation passes, create a new UserVehicle
        UserVehicle::create([
            'means_of_purchase' => $request->input('means_of_purchase'),
            'vehicle_color' => $request->input('vehicle_color'),
            'phone_contact' => $request->input('phone_contact'),
            'vehicle_model' => $request->input('vehicle_model'),
            'vehicle_make' => $request->input('vehicle_make'),
            'vehicle_type' => $request->input('vehicle_type'),
            'vehicle_registration_number' => $request->input('vehicle_registration_number'),
            'email' => $request->input('email'),
            'full_name' => $request->input('full_name'),
        ]);

        // Redirect to a success page or any other appropriate action
        return redirect('/')->with('success', 'User vehicle created successfully!');
    }

    //API ROUTES

    public function vehicle(Request $request)
    {
        $vehicle = UserVehicle::where('vehicle_registration_number', $request->vehicle)->first();
        if ($vehicle) {
            return response()->json(['success' => true, 'data' => $vehicle]);
        }
        return response()->json(['success' => false, 'data' => "Vehicle with plate number " . $request->vehicle . " NOT FOUND"], 404);
    }
}
