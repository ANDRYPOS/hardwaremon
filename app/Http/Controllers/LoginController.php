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
        //
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
                'email.required' => 'Isi email terlebih dahulu!',
                'password.required' => 'Password salah'
            ]
        );
        // cek validasi request

        // proses
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // jika invalid
        return back()->withErrors([
            'email' => 'Email tidak ditemukan.',
            'password' => 'Password salah'
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
        return redirect('/')->with('succes', 'Berhasil logout');
    }
}
