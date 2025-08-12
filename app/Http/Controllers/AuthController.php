<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class AuthController extends Controller
{
    // Show register page
    public function showRegister()
    {
        if (Cookie::get('user_id')) {
            return redirect('/dashboard');
        }
        return view('register');
    }

    // Handle register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // set cookie after registration
        Cookie::queue('user_id', $user->id, 60); // 60 minutes
        return redirect('/dashboard');
    }

    // Show login page
    public function showLogin()
    {
        if (Cookie::get('user_id')) {
            return redirect('/dashboard');
        }
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Cookie::queue('user_id', $user->id, 60); // 60 minutes
            return redirect('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Dashboard
    public function dashboard()
    {
        $userId = Cookie::get('user_id');
        if (!$userId) {
            return redirect('/login');
        }

        $user = User::find($userId);
        return view('dashboard', compact('user'));
    }

    // Logout
    public function logout()
    {
        Cookie::queue(Cookie::forget('user_id'));
        return redirect('/login');
    }
}
