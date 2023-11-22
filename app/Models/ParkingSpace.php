<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'size', 'occupied'];

    public function entries() {
        return $this->hasMany(UserVehicleEntry::class);
    }

}
