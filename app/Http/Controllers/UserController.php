<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Display the login view
    public function login(Request $request)
    {
        // If POST request, attempt authentication
        if ($request->isMethod('post')) {
            $request->validate([
                'user_username' => 'required|string',
                'user_password' => 'required',
            ]);

            $user = User::where('user_username', $request->input('user_username'))->first();

            if ($user && Hash::check($request->input('user_password'), $user->user_password)) {
                Auth::login($user);
                // Redirect to a protected route or dashboard
                return redirect()->intended('/dashboard');
            } else {
                return back()->withErrors(['Invalid credentials']);
            }
        }
        // For GET request, show the login view
        return view('auth.login');
    }
}
