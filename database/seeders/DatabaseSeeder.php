<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserVehicleEntry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@dash.com',
        //     'password' => Hash::make('password'),
        // ]);

        UserVehicleEntry::create([
            'driver_name' => 'driver name',
            'parking_space_id' => 1,
            'status' => 'IN',
            'user_vehicle_id' => 1
        ]);
    }
}
