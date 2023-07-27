<?php

namespace App\Http\Controllers;

use App\Models\ParcelBooking;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QuizModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(Request $request)
    {
        $senders = User::role(['Sender'])->count();
        $riders = User::role(['Rider'])->count();
        $bookings = ParcelBooking::select('id')->count();

        return view('admin.index', compact('senders', 'riders', 'bookings'));

        if(Auth::user()->hasRole('Salesperson')) {
            
            $salespersonid = Auth::user()->id;
            return view('admin.index',compact('salespersonid'));

        } else {
           
            return view('admin.index');
        }
    }
}
