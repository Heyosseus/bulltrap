<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function checkSession(): JsonResponse
    {
        $isSessionActive = false;
        $isGoogleAuthenticated = session('google_authenticated') ?? false;
        $isGithubAuthenticated = session('github_authenticated') ?? false;

        if (Auth::check()) {
            $isSessionActive = true;
        }

        return response()->json([
            'isSessionActive' => $isSessionActive,
            'isGoogleAuthenticated' => $isGoogleAuthenticated,
            'isGithubAuthenticated' => $isGithubAuthenticated,
        ]);
    }
}
