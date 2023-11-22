<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVehicleEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_vehicle_id',
        'time_out',
        'status',
        'parking_space_id',
        'driver_name',
    ];

    public function vehicle() {
        return $this->belongsTo(UserVehicle::class, 'user_vehicle_id');
    }

    public function space() {
        return $this->belongsTo(ParkingSpace::class, 'parking_space_id');
    }
}
