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
        return view('register');
    }

    //proses simpan regist
    public function store(Request $request)
    {
        // validattion
        $message = [
            'required' => 'Cannot be empty!',
            'unique' => 'Already exist!',
            'email' => 'Must be accompanied @!',
            'min' => 'Minimum 2 characters!',
            'numeric' => 'Must contain numeric!',
            'mimes' => 'Format not found!: jpeg,png,jpg',
            'max' => 'Max 2 Mb!',
            'string' => 'Input must be a string!'
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

        // create user dengan role sebagai user
        $users = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role' => 'user',
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login')->with('toast_success', 'Registrasi succesfully');
    }
}
