<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AuthGoogleController::class)->group(function () {
    Route::get('/auth/google/redirect', 'redirect')->name('google.redirect');
    Route::get('/auth/google/call-back', 'callback')->name('google.callback');
});

Route::get('/{any}', function () {
    return view('welcome'); // Ensure this view contains your Vue.js application
})->where('any', '.*');
