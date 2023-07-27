<?php

namespace App\Http\Controllers;

use App\Models\ParcelBooking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookingApiController extends Controller
{
    function __construct()
    {
        
    }
    
    function booking(Request $request) {
        try {
            if($request->isMethod('post')) {
                try{
                    $valid =  $request->validate([
                        'pickup' => 'required|max:255',
                        'dropoff' => 'required|max:255',
                    ]);
            
                    if ($valid) {
                        $booking = new ParcelBooking();
                        $booking->pickup = $request->input('pickup');
                        $booking->dropoff = $request->input('dropoff');
                        $booking->created_by = auth()->user()->id;
                        
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
                    } else {
                        $data["success"] = false;
                        $data["message"] = "Validation failed.";
                    }
    
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

    function bookingStatus(Request $request, $tracking_id) {
        try {
            $booking = ParcelBooking::select('id','pickup','dropoff','rider_id', 'created_by', 'status')
                        ->where('id', $tracking_id)
                        ->with('rider:id,first_name');

            if(!$booking->first()->rider()->exists()) {
                return response()->json([
                    "message" => "No Rider picked the parcel yet."
                ]);
            } else if($booking->count() > 0) {
                return response()->json([
                    "data" => $booking->first()
                ]);
            } else {
                return response()->json([
                    "message" => "No Booking on this tracking ID."
                ]);
            }

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
    
            if ($valid) {
                $bookParcel = ParcelBooking::where('id', $request->parcel_id)->whereNull('rider_id');
                
                if ($bookParcel->first() === null) {
                    $data["message"] = "Parcel is already picked by another rider.";
                } else {
                    $bookParcel->update([
                        'rider_id' => auth()->user()->id,
                        'status' => 2 // Picked by Rider
                    ]);
                    $data["message"] = "Parcel Picked, make sure update the status when delivered.";
                }
            } else {
                $data["success"] = false;
                $data["message"] = "Parcel ID is required.";
            }

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
    
            if ($valid) {
                $bookParcel = ParcelBooking::where('id', $request->parcel_id)->where('rider_id', auth()->user()->id);
                
                if ($bookParcel->first() === null) {
                    $data["message"] = "You haven't picked parcel with this parcel id.";
                } else {
                    $bookParcel->update([
                        'rider_id' => auth()->user()->id,
                        'status' => 3 // Delivered
                    ]);
                    $data["message"] = "Parcel delivered to the destination.";
                }
            } else {
                $data["success"] = false;
                $data["message"] = "Parcel ID is required.";
            }

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
