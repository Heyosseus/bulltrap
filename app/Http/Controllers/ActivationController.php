<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($token) : \Illuminate\Http\RedirectResponse
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Invalid activation token.');
        }

        $user->markEmailAsVerified();
        $user->activation_token = null;
        $user->save();

        return redirect('/dashboard')->with('success', 'Account activated successfully.');
    }
}
