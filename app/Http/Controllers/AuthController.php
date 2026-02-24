<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show register step 1
    public function showRegister()
    {
        return view('register');
    }

    // Handle register step 1 - store in session, redirect to step 2
    public function registerStep1(Request $request)
    {
        $validated = $request->validate([
            'last_name'      => ['required', 'string', 'max:255'],
            'first_name'     => ['required', 'string', 'max:255'],
            'middle_name'    => ['nullable', 'string', 'max:255'],
            'extension_name' => ['nullable', 'string', 'max:50'],
        ]);

        $request->session()->put('register_step1', $validated);

        return redirect()->route('register.step2');
    }

    // Show register step 2
    public function showRegisterStep2(Request $request)
    {
        if (!$request->session()->has('register_step1')) {
            return redirect()->route('register');
        }

        return view('register_step2');
    }

    // Handle final registration
    public function register(Request $request)
    {
        if (!$request->session()->has('register_step1')) {
            return redirect()->route('register');
        }

        $validated = $request->validate([
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $step1 = $request->session()->pull('register_step1');

        $user = User::create([
            'last_name'      => $step1['last_name'],
            'first_name'     => $step1['first_name'],
            'middle_name'    => $step1['middle_name'] ?? null,
            'extension_name' => $step1['extension_name'] ?? null,
            'email'          => $validated['email'],
            'password'       => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
