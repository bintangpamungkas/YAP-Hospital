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
            
            if ($user && $request->input('user_password') === $user->user_password) {
                Auth::login($user);
                // Redirect ke route baru /admin/dashboard ketika login sukses
                return redirect('/admin/dashboard');
            } else {
                return back()->withErrors(['Invalid credentials']);
            }
        }
        // For GET request, show the login view
        return abort(401);
    }

    // Function logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // New function to get detailed data of the currently logged-in user
    public function getLoggedInUserDetails(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'No logged-in user found.'], 404);
        }
        return response()->json([
            'user_id'           => $user->user_id,
            'user_name'         => $user->user_name,
            'user_email'        => $user->user_email,
            'user_birth_date'   => $user->user_birth_date,
            'user_institution'  => $user->user_institution,
            'user_last_login'   => $user->user_last_login,
            // ...include other detailed fields as needed...
        ]);
    }
}
