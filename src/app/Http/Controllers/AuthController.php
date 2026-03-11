<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('register');
    }

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

    public function showRegisterStep2(Request $request)
    {
        if (!$request->session()->has('register_step1')) {
            return redirect()->route('register');
        }

        return view('register_step2');
    }

    public function register(Request $request)
    {
        if (!$request->session()->has('register_step1')) {
            return redirect()->route('register');
        }

        $validated = $request->validate([
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $request->session()->put('register_step2', [
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $request->session()->put('otp', $otp);
        $request->session()->put('otp_expires_at', now()->addMinutes(10)->timestamp);
        $request->session()->put('register_email', $validated['email']);

        Mail::to($validated['email'])->send(new OtpEmail($otp));

        return redirect()->route('verification.show');
    }

    public function showVerification(Request $request)
    {
        if (!$request->session()->has('register_step2')) {
            return redirect()->route('register');
        }
        return view('verification');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => ['required', 'digits:6']]);

        $sessionOtp     = $request->session()->get('otp');
        $expiresAt      = $request->session()->get('otp_expires_at');
        $step1          = $request->session()->get('register_step1');
        $step2          = $request->session()->get('register_step2');

        if (!$sessionOtp || !$step1 || !$step2) {
            return redirect()->route('register')->withErrors(['otp' => 'Session expired. Please register again.']);
        }

        if (now()->timestamp > $expiresAt) {
            return back()->withErrors(['otp' => 'The OTP has expired. Please request a new one.']);
        }

        if ($request->otp !== $sessionOtp) {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        $user = User::create([
            'last_name'      => $step1['last_name'],
            'first_name'     => $step1['first_name'],
            'middle_name'    => $step1['middle_name'] ?? null,
            'extension_name' => $step1['extension_name'] ?? null,
            'email'          => $step2['email'],
            'password'       => $step2['password'],
        ]);

        $request->session()->forget(['register_step1', 'register_step2', 'otp', 'otp_expires_at', 'register_email']);

        Auth::login($user);
        return redirect()->route('home');
    }

    public function resendOtp(Request $request)
    {
        if (!$request->session()->has('register_step2')) {
            return redirect()->route('register');
        }

        $email = $request->session()->get('register_email');
        $otp   = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $request->session()->put('otp', $otp);
        $request->session()->put('otp_expires_at', now()->addMinutes(10)->timestamp);

        Mail::to($email)->send(new OtpEmail($otp));

        return redirect()->route('verification.show')->with('success', 'A new OTP has been sent to your email.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
