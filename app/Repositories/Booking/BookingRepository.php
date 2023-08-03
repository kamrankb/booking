<?php 
namespace App\Repositories\Booking;

use App\Repositories\Booking\BookingInterface;
use App\Models\ParcelBooking;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookingRepository implements BookingInterface {
    protected $booking;

    function __construct(ParcelBooking $booking)
    {
        $this->booking = $booking;
    }

    // Fetch all available booking
    public function available($userID) {
        return $this->booking->userBooking($userID);
    }

    // Track the status of the parcel
    public function track($id) {
        $booking = $this->booking->track($id);

        if(!$booking->first()->rider()->exists()) {
            throw new ModelNotFoundException("No Rider picked the parcel yet.");
        } else if($booking->count() > 0) {
            return $booking->first();
        } else {
            throw new ModelNotFoundException("No Booking on this tracking ID.");
        }
    }

    // Book parcel
    public function booking($data) {
        $booking = new $this->booking;
        $booking->pickup = $data['pickup'];
        $booking->dropoff = $data['dropoff'];
        $booking->created_by = $data['user_id'];
        
        if ($booking->save()) {
            $data["message"] = "Your Parcel is Booked.";
            $data["data"] = array(
                "tracking_id" => $booking->id,
                "pickup" => $booking->pickup,
                "dropoff" => $booking->dropoff,
            );
        } else {
            $data["success"] = false;
            $data["message"] = "Booking Not Added Successfully.";
        }

        return $data;
    }

    // Pick parcel
    public function pick($id, $riderID) {
        $bookParcel = $this->booking->availableParcel($id);
                
        if ($bookParcel->first() === null) {
            throw new ModelNotFoundException("Parcel is already picked by another rider.");
        } else {
            $bookParcel->update([
                'rider_id' => $riderID,
                'status' => 2 // Picked by Rider
            ]);
            return "Parcel Picked, make sure update the status when delivered.";
        }
    }

    // Update the status of the parcel
    public function updateStatus($id, $userID) {
        $bookParcel = $this->booking->updateStatus($id, $userID);
                
        if ($bookParcel->first() === null) {
            throw new ModelNotFoundException("You haven't picked parcel with this parcel id.");
        } else {
            $bookParcel->update([
                'status' => 3 // Delivered
            ]);

            return "Parcel delivered to the destination.";
        }
    } 
}