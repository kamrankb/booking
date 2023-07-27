<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//FRONTEND
Route::name('front.')->group(function() {
       Route::get('/', function() {
              return redirect()->route('login');
       })->name('home');
       
});

Auth::routes();