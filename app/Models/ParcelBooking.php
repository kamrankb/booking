<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelBooking extends Model
{
    use HasFactory;

    protected $table = "parcel_bookings";

    protected $fillable = ['created_by', 'pickup', 'dropoff', 'rider_id', 'status'];

    function rider() {
        return $this->hasOne(User::class, 'id', 'rider_id');
    }

    function getStatusAttribute($value) {
        $status = array('Not Booked', 'Booked', 'Picked By Rider', 'Delivered');
        return $status[$value];
    }
}
