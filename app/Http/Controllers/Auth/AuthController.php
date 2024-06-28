<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Log;
use App\Mail\AccountActivationMail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
        public function register(Request $request): JsonResponse
        {
            $attributes = $request->validate(
                [
                    'email'    => 'required|email|unique:users,email',
                    'name' => 'required|string|',
                    'password' => 'required|string|min:8',
                ]
            );
            $attributes['password'] = bcrypt($attributes['password']);
            $attributes['activation_token'] = Str::random(60);

            $newUser = User::create($attributes);

            Mail::to($newUser->email)->send(new AccountActivationMail($newUser));
            $newUser->save();

            return response()->json(['user' => $newUser], 200);
        }

    public function login(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required|string|min:6',
            ]);
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                return response()->json(['user' => $user], 200);
            } else {
                throw ValidationException::withMessages([
                    'email'    => 'The provided credentials are incorrect.',
                    'password' => 'The provided credentials are incorrect.',
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 401);
        }
    }

    public function logout(): JsonResponse
    {
        try {
            Auth::guard('web')->logout();
            return response()->json(['message' => 'Logged out!'], 200);
        } catch (\Exception $e) {
            Log::error('Logout error: ' . $e->getMessage());
            return response()->json(['message' => 'Error occurred during logout'], 500);
        }
    }
}
