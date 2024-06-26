<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AuthGoogleController::class)->group(function () {
    Route::get('/auth/google/redirect', 'redirect')->name('google.redirect');
    Route::get('/auth/google/call-back', 'callback')->name('google.callback');
});

Route::controller(\App\Http\Controllers\AuthGithubController::class)->group(function () {
    Route::get('/auth/github/redirect', 'redirect')->name('github.redirect');
    Route::get('/auth/github/call-back', 'callback')->name('github.callback');
});

Route::get('/check-session', [\App\Http\Controllers\SessionController::class, 'checkSession'])->name('session.check-session');

Route::get('/{any}', function () {
    return view('welcome'); // Ensure this view contains your Vue.js application
})->where('any', '.*');
