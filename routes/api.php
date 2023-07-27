<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingApiController;

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::group(['middleware' => ['auth:sanctum', 'role:Admin|Sender|Rider']], function () {
    // Parcel routes
    Route::get('parcel/bookings', [BookingApiController::class, 'booking']);
    Route::post('parcel/create', [BookingApiController::class, 'booking']);
    Route::post('booking/parcel', [BookingApiController::class, 'bookParcel']); // parcel_id as body
    Route::post('Booking/parcel/status', [BookingApiController::class, 'updateStatus']);
    Route::post('track/{tracking_id}', [BookingApiController::class, 'bookingStatus']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});
