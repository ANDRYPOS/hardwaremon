<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // halaman regis
    public function index()
    {
        //
        return view('register');
    }

    //proses simpan regist
    public function store(Request $request)
    {

        $message = [
            'required' => 'Tidak boleh kosong',
            'unique' => 'Sudah digunakan',
            'email' => 'Harus disertai @',
            'alpha' => 'Harus berisi teks',
            'min' => 'Minimal 2 karakter',
            'numeric' => 'Harus berisi numeric',
            'mimes' => 'Format tidak sesuai: jpeg,png,jpg',
            'max' => 'Max 2 Mb',
            'string' => 'Harus string'
        ];
        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required|string|min:2',
                'phone' => 'required|numeric',
                'password' => 'required|min:2',
            ],
            $message
        );
        // dd($request->all());
        $users = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role' => 'user',
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login')->with('success', 'Berhasil registrasi');
    }
}
