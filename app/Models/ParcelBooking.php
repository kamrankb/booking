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

    function track($tracking_id) {
        return static::select('id','pickup','dropoff','rider_id', 'created_by', 'status')
                        ->where('id', $tracking_id)
                        ->with('rider:id,first_name');
    }

    function updateStatus($id, $userID) {
        return static::find($id)->where('rider_id', $userID);
    }

    function availableParcel($id="") {
        $parcel = static::select('id','pickup','dropoff')->whereNull('rider_id');

        if($id!="") {
            $parcel->where('id', $id);
        }

        return $parcel;
    }

    function userBooking($id) {
        return static::availableParcel()->where('id', $id);
    }
}
