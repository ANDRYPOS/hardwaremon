<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //tampil halaman login
    public function index()
    {
        return view('login');
    }

    /**
     * proses login
     */
    public function authenticate(Request $request): RedirectResponse
    {
        // cek validasi request
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email cannot be empty!',
                'password.required' => 'Password cannot be empty!'
            ]
        );

        // proses
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('toast_success', 'Login successfully');
        }

        // jika invalid
        return back()->withErrors([
            'email' => 'Email not found',
            'password' => 'Wrong password'
        ])->onlyInput(['email', 'password']);
    }

    /**
     * proses logout
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
