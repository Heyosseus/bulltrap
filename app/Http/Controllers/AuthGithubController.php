<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthGithubController extends Controller
{
    public function redirect(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            $user = User::where('email', $githubUser->getEmail())->first();

            if ($user) {
                Auth::login($user);
                session(['github_authenticated' => true]);
                return redirect(env('FRONTEND_URL') . '/dashboard');
            } else {
                $user = User::create([
                    'name'              => $githubUser->getName(),
                    'email'             => $githubUser->getEmail(),
                    'github_id'         => $githubUser->getId(),
                    'avatar'            => $githubUser->getAvatar(),
                    'email_verified_at' => now(),
                ]);
                session(['github_authenticated' => true]);

                Auth::login($user);

                return redirect(env('FRONTEND_URL') . '/dashboard')->with('success', 'You have successfully logged in.');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
