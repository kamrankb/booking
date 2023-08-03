<?php
namespace App\Repositories\Booking;

interface BookingInterface {
    // Fetch all available booking
    public function available($userID);

    // Track the status of the parcel
    public function track($id);

    // Book parcel
    public function booking($data);

    // Pick parcel
    public function pick($id, $riderID);

    // Update the status of the parcel
    public function updateStatus($id, $userID);
}