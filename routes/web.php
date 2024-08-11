<?php

use App\Http\Controllers\ActivationController;
use App\Http\Controllers\ScraperController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Auth\AuthGoogleController::class)->group(function () {
    Route::get('/auth/google/redirect', 'redirect')->name('google.redirect');
    Route::get('/auth/google/call-back', 'callback')->name('google.callback');
});

Route::controller(\App\Http\Controllers\Auth\AuthGithubController::class)->group(function () {
    Route::get('/auth/github/redirect', 'redirect')->name('github.redirect');
    Route::get('/auth/github/call-back', 'callback')->name('github.callback');
});

Route::controller(\App\Http\Controllers\Auth\AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth:sanctum');
});

Route::get('/scrape', [ScraperController::class, 'scrape']);


Route::get('/check-session', [SessionController::class, 'checkSession'])->name('session.check-session');
Route::get('/account/activate/{token}', [ActivationController::class, 'activate'])->name('account.activate');

Route::get('/{any}', function () {
    return view('welcome'); // Ensure this view contains your Vue.js application
})->where('any', '.*');
