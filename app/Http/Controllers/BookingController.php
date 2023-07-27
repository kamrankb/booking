<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\ParcelBooking;
use App\Models\User;
use App\Notifications\QuickNotify;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Booking-Create|Booking-Edit|Booking-View|Booking-Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Booking-Create', ['only' => ['form', 'store']]);
        $this->middleware('permission:Booking-Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Booking-Delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $bookings = ParcelBooking::all();
            return DataTables::of($bookings)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<button href="#"  class="btn btn-primary btn-view"  data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $row->id . '"><i class="far fa-eye"></i></button>&nbsp';
                    if (Auth::user()->can('Subscriber-Edit')) {
                        $html .= '<a href="' . route('booking.edit', $row->id) . '"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp';
                    }
                    if (Auth::user()->can('Subscriber-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="banner_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/img/users/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })->rawColumns(['action', 'status', 'image', 'created_at'])->make(true);
        }

        return view('admin.bookings.list');
    }

    public function form($id = 0)
    {
        return view('admin.bookings.form');
    }

    public function status(Request $request, $id)
    {
        $subject = ParcelBooking::find($id);
        $subject->active = (($request->status == "true") ? 1 : 0);

        $response = array();

        if ($subject->save()) {
            $response["success"] = true;
            $response["message"] = "Booking Status Updated Successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to Update Subject Status!";
        }

        return response()->json($response);
    }

    public function store(Request $request)
    {
        try {
            $valid =  $request->validate([
                'pickup' => 'required|max:255',
                'dropoff' => 'required|max:255',
            ]);
    
            if ($valid) {
                $booking = new ParcelBooking();
                $booking->pickup = $request->input('pickup');
                $booking->dropoff = $request->input('dropoff');
                
                $management = User::role(['Admin', 'Rider'])->get();
                $management->pluck('id');
                $data = array(
                    "success" => true,
                    "message" => "New Parcel Booked."
                );
    
                if ($booking->save()) {
                    $notify = array(
                        "performed_by" => Auth::user()->id,
                        "title" => "New Parcel Booked.",
                        "desc" => array(
                            "pickup" => $request->input('name'),
                            "dropoff" => $request->input('dropoff'),
                        )
                    );
                    Notification::send($management, new QuickNotify($notify));
                    Session::flash('success', $data["message"]);
                } else {
                    $data["success"] = false;
                    $data["message"] = "Booking Not Added Successfully.";
                    Session::flash('error', $data["message"]);
                }
            } else {
                $data["success"] = false;
                $data["message"] = "Validation failed.";
                Session::flash('error', $data["message"]);
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

    public function edit(Request $request, $id)
    {
        $where = array('id' => $request->id);
        $subject  = ParcelBooking::where($where)->first();

        return view('admin.booking.edit', compact('subject'));
    }

    public function view(Request $request, $isTrashed = null)
    {
        $where = array('id' => $request->id);

        if ($isTrashed != null) {
            $contactqueries = ParcelBooking::onlyTrashed()->where($where)->first();
        } else {
            $contactqueries = ParcelBooking::where($where)->first();
        }

        return response()->json($contactqueries);
    }

    public function update(Request $request)
    {
        try {
            $valid =  $request->validate([
                'name' => 'required',
                'title' => 'required',
                'description' => 'nullable',
            ]);
    
            if ($valid) {
                $subject = ParcelBooking::find($request->id);
                $subject->name = $request->input('name');
                $subject->title = $request->input('title');
                $subject->description = strip_tags($request->description);
    
                $management = User::role(['Admin'])->get();
                $management->pluck('id');
                $data = array(
                    "success" => true,
                    "message" => "Booking Updated Successfully"
                );
    
                if ($subject->save()) {
                    $notify = array(
                        "performed_by" => Auth::user()->id,
                        "title" => "Booking Updated Successfully",
                        "desc" => array(
                            "added_title" => $request->input('name'),
                            "added_description" => $request->email,
                        )
                    );
                    Notification::send($management, new QuickNotify($notify));
                    Session::flash('success', $data["message"]);
                } else {
                    $data["success"] = false;
                    $data["message"] = "Booking Not Updated Successfully.";
    
                    Session::flash('error', $data["message"]);
                }
    
                return redirect()->route('booking.list')->with($data);
            } else {
                return response()->back();
            }
        } catch(ValidationException $ex) {
            return response()->json([
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        } catch(Exception $ex) {
            return response()->json([
                "error" => $ex->getCode(),
                "message" => $ex->getMessage()
            ]);
        }
    }

    public function restore(Request $request, $id)
    {
        $Contactqueries = ParcelBooking::withTrashed()->find($id);
        $response = array(
            "success" => true,
            "message" => "Booking Restored Successfully!"
        );

        if (!$Contactqueries->restore()) {
            $response["success"] = false;
            $response["message"] = "Failed to Restore Subject!";
        }

        return redirect()->route('booking.list')->with($response);
    }

    public function destroy(Request $request)
    {
        $subscriber = ParcelBooking::onlyTrashed()->find($request->id);

        $response = array(
            "success" => true,
            "message" => "Booking Destroy Successfully!"
        );

        if (!$subscriber->forceDelete()) {
            $response["success"] = false;
            $response["message"] = "Failed to Destroy Subject!";
        }

        return response()->json($response);
    }

    public function delete(Request $request)
    {
        $subject = ParcelBooking::find($request->id);
        $response = array(
            "success" => true,
            "message" => "Booking deleted Successfully!"
        );

        if (!$subject->delete()) {
            $response["success"] = false;
            $response["message"] = "Failed to deleted Subject!";
        }

        return response()->json($response);
    }

    public function trashed(Request $request)
    {
        if ($request->ajax()) {
            $subscriber = ParcelBooking::onlyTrashed();
            return DataTables::of($subscriber)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<button href="#"  class="btn btn-primary btn-view"  data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $row->id . '"><i class="far fa-eye"></i></button>&nbsp';
                    if (Auth::user()->can('Subscriber-Edit')) {
                        $html .= '<a href="' . route('bookings.restore', $row->id) . '"  class="btn btn-success btn-restore" ><i class="mdi mdi-delete-restore"></i></a>&nbsp';
                    }
                    if (Auth::user()->can('Subscriber-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="subscriber_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/img/users/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })->rawColumns(['action', 'status', 'deleted_at', 'image'])->make(true);
        }

        return view('admin.bookings.trashed');
    }

    public function subjectApi()
    {
        $bookings = ParcelBooking::all();
        return response()->json($bookings);
    }
}
