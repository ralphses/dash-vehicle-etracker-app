<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewParkingSpaceRequest;
use App\Models\ParkingSpace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParkingSpaceController extends Controller
{
    public function index(): Response
    {
        $spaces = ParkingSpace::paginate(15);
        return response()->view('backend.space', compact('spaces'));
    }

    public function create(): Response
    {
        return response()->view('backend.space-add');
    }

    public function store(NewParkingSpaceRequest $request): RedirectResponse
    {
        $request->validated();

        ParkingSpace::create([
            'occupied' => false,
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'name' => $request->input('name')
        ]);

        return response()->redirectTo(route('spaces'));
    }

    public function show(ParkingSpace $space): Response
    {
        return response()->view('backend.space-one', compact('space'));
    }

    public function delete(Request $request): RedirectResponse
    {
        ParkingSpace::destroy($request->space);
        return response()->redirectTo(route('spaces'));
    }

    public function get()
    {
        $spaces = ParkingSpace::all();
        return response()->json(
            [
                'success' => true,
                'data' => $spaces
            ]
        );
    }
}
