<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    //tampil form group user
    public function usersGroup()
    {
        $users = User::all();
        /* dd($products); */
        return view('users.usersGroup', compact('users'));
    }

    // filter admin
    public function admin()
    {
        $users = User::where('role', 'admin')->get();
        /* dd($users); */
        return view('users.usersGroup', compact('users'));
    }

    // filter staff
    public function staff()
    {
        $users = User::where('role', 'staff')->get();
        return view('users.usersGroup', compact('users'));
    }

    // filter user
    public function users()
    {
        $users = User::where('role', 'user')->get();
        return view('users.usersGroup', compact('users'));
    }


    /**
     * tampil halman setting
     */
    public function setting()
    {
        //
        $users = User::all();
        /* dd($categories); */
        return view('users.usersSetting', compact('users'));
    }

    /**
     * tampil halaman create
     */
    public function create()
    {
        //
        $users = User::all();
        return view('users.usersCreate', compact('users'));
    }

    /**
     * proses simpan create
     */
    public function store(Request $request)
    {
        // dd($request->all());
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
                'role' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'password' => 'required|min:2',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2024',
            ],
            $message
        );
        $imageName = 'avatar_user_' . time() . '.' . $request->avatar->getClientOriginalExtension();
        $path = Storage::putFileAs('public/avatars', $request->file('avatar'), $imageName);
        $users = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'avatar' => $imageName,
        ]);
        return redirect('/users-setting')->with('toast_success', 'Data Berhasil Disimpan');
    }

    /**
     * tampil halaman edit
     */
    public function edit($id)
    {
        //
        /* dd($products); */
        $users = User::where('id', $id)->get();
        return view('users.usersEdit', compact('users'));
    }

    /**
     * proses update
     */
    public function update(Request $request)
    {
        //
        // dd($request->all());
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
                'name' => 'required|string|min:2',
                'role' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'password' => 'required|min:2',
            ],
            $message
        );

        $users = User::where('id', $request->id)->first();
        if ($request->hasFile('avatar')) {

            // hapus file
            $delete = Storage::delete('public/avatars/' . $users->avatar);

            // upload file baru
            $name = $request->file('avatar');
            $imageName = 'avatar_user_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/avatars', $request->file('avatar'), $imageName);
            $users->update([
                'avatar' => $imageName
            ]);
        }
        $users->update([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
        ]);

        return redirect('/users-setting')->with('toast_success', 'Data Berhasil Diupdate');
    }

    /**
     * proses hapus
     */
    public function destroy($id)
    {
        // dd($id);
        $users = User::find($id);

        $delete = Storage::delete('public/avatars/' . $users->avatar);
        $users->delete();
        return redirect('/users-setting')->with('toast_success', 'Data Berhasil Didelete');
    }

    /**
     * profil
     */
    public function profil($id)
    {
        $users = User::where('id', $id)->get();
        return view('users.usersProfil', compact('users'));
    }

    // update profil (khusus sudah login)
    public function profilUpdate(Request $request)
    {
        /* dd($request->all()); */
        $message = [
            'unique' => 'Sudah digunakan',
            'email' => 'Harus disertai @',
            'min' => 'Minimal 2 karakter',
            'numeric' => 'Harus berisi numeric',
            'mimes' => 'Format tidak sesuai: jpeg,png,jpg',
            'max' => 'Max 2 Mb',
            'string' => 'Harus string',
            'required' => 'Harus diisi!'
        ];
        $request->validate(
            [
                'name' => 'required|string|min:2',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'email' => 'required',
                'password' => 'required',
            ],
            $message
        );

        $users = User::where('id', $request->id)->first();
        // dd($users);
        if ($request->hasFile('avatar')) {

            // hapus file
            $delete = Storage::delete('public/avatars/' . $users->avatar);

            // upload file baru
            $name = $request->file('avatar');
            $imageName = 'avatar_user_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/avatars', $request->file('avatar'), $imageName);
            $users->update([
                'avatar' => $imageName
            ]);
        }
        $users->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
        ]);

        return back()->with('toast_success', 'Profil Berhasil Diupdate');
    }
}
