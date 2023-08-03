<?php

namespace App\Http\Controllers;

use App\Models\ParcelBooking;
use App\Repositories\Booking\BookingInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookingApiController extends Controller
{
    private $bookingI;
    
    function __construct(BookingInterface $bookingI)
    {
        $this->bookingI = $bookingI;
    }
    
    function create(Request $request) {
        try{
            $valid =  $request->validate([
                'pickup' => 'required|max:255',
                'dropoff' => 'required|max:255',
            ]);
            $parcel = array(
                "pickup" => $valid["pickup"],
                "dropoff" => $valid["dropoff"],
                "user_id" => auth()->user()->id,
            );
            $data = $this->bookingI->booking($parcel);
            return response()->json($data);

        } catch(ValidationException $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        } catch(Exception $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        }
    }

    function booking(Request $request) {
        try {
            $bookings = ParcelBooking::select('id','pickup','dropoff')
                        ->whereNull("rider_id")
                        ->where('id', auth()->user()->id);
    
            if($bookings->count() > 0) {
                return response()->json([
                    "data" => $bookings->get()
                ]);
            } else {
                return response()->json([
                    "message" => "No Bookings registered."
                ]);
            }

            return response()->json($bookings);
        } catch(Exception $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        }
        
    }

    function bookingStatus($tracking_id) {
        try {
            $booking = $this->bookingI->track($tracking_id);

            return response()->json([
                "data" => $booking
            ]);
            
        } catch (Exception $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        }
    }

    function bookParcel(Request $request) {
        $data["status"] = true;
        try{
            $valid =  $request->validate([
                'parcel_id' => 'required|max:255',
            ]);
            
            $data["message"] = $this->bookingI->pick($valid["parcel_id"], auth()->user()->id);
                
            return response()->json($data);

        } catch(ValidationException $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        } catch(Exception $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        }
    }

    function updateBookingStatus(Request $request) {
        $data["status"] = true;
        try{
            $valid =  $request->validate([
                'parcel_id' => 'required|max:255',
            ]);
            
            $data["message"] = $this->bookingI->updateStatus($valid['id'], auth()->user()->id);

            return response()->json($data);

        } catch(ValidationException $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        } catch(Exception $ex) {
            return response()->json([
                "success" => false,
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        }
    }
}
