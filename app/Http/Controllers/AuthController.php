<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // SHOW LOGIN PAGE
    public function showLogin()
    {
        return view('auth.login');
    }


    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'The provided email or password is incorrect.',
            ])
            ->onlyInput('email');
    }


    // SHOW REGISTER PAGE
    public function showRegister()
    {
        return view('auth.register');
    }


    // REGISTER
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255|unique:users,email',

            'password' => 'required|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make($validated['password']),

            // New registrations are Customer/Guest
            'role' => 'Customer/Guest',
        ]);


        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }


    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}