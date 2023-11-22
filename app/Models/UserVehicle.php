<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'means_of_purchase',
        'vehicle_color',
        'vehicle_model',
        'vehicle_make',
        'vehicle_type',
        'vehicle_registration_number',
        'email',
        "phone_contact",
        'full_name',
    ];

    public function entries() {
        return $this->hasMany(UserVehicleEntry::class);
    }
}
