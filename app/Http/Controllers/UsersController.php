<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //tampil form group user
    public function usersGroup()
    {
        // get data user dr database
        $users = User::all();

        // pashing data ke usergroup
        return view('users.usersGroup', compact('users'));
    }

    // filter admin
    public function admin()
    {
        // get data user berdasarkan role admin
        $users = User::where('role', 'admin')->get();
        return view('users.usersGroup', compact('users'));
    }

    // filter staff
    public function staff()
    {
        // get data user berdasarkan role staff
        $users = User::where('role', 'staff')->get();
        return view('users.usersGroup', compact('users'));
    }

    // filter user
    public function users()
    {
        // get data user berdasarkan role user
        $users = User::where('role', 'user')->get();
        return view('users.usersGroup', compact('users'));
    }


    /**
     * tampil halman setting
     */
    public function setting()
    {
        //get data user dari database
        $users = User::all();

        // pashing data ke view
        return view('users.usersSetting', compact('users'));
    }

    /**
     * tampil halaman create
     */
    public function create()
    {
        //get data user
        $users = User::all();

        // pashing data ke view
        return view('users.usersCreate', compact('users'));
    }

    /**
     * proses simpan create
     */
    public function store(Request $request)
    {
        // validation
        $message = [
            'required' => 'Cannot be empty!',
            'unique' => 'Email already used!',
            'email' => 'Must be accompanied @',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numeric',
            'mimes' => 'Format not found: jpeg,png,jpg',
            'max' => 'Maximum 2 Mb',
        ];
        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required|min:2',
                'role' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'password' => 'required|min:2',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2024',
            ],
            $message
        );

        // convert nama file
        $imageName = 'avatar_user_' . time() . '.' . $request->avatar->getClientOriginalExtension();

        // masukkan file ke storgae
        $path = Storage::putFileAs('public/avatars', $request->file('avatar'), $imageName);

        // create data user ke database
        $users = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'avatar' => $imageName,
        ]);
        return redirect('/users-setting')->with('toast_success', 'Data Saved Successfully');
    }

    /**
     * tampil halaman edit
     */
    public function edit($id)
    {
        // get data user berdasarkan id
        $users = User::where('id', $id)->get();

        // pashing data ke view
        return view('users.usersEdit', compact('users'));
    }

    /**
     * proses update
     */
    public function update(Request $request)
    {
        // validation
        $message = [
            'required' => 'Cannot be empty!',
            'unique' => 'Email already used!',
            'email' => 'Must be accompanied @',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numeric',
            'mimes' => 'Format not found: jpeg,png,jpg',
            'max' => 'Maximum 2 Mb',
        ];
        $request->validate(
            [
                'name' => 'required|min:2',
                'role' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'password' => 'required|min:2',
            ],
            $message
        );

        // get user berdasarkan id
        $users = User::where('id', $request->id)->first();

        // cek jika update file
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
        // update data
        $users->update([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
        ]);

        return redirect('/users-setting')->with('toast_success', 'Data Successfully Updated');
    }

    /**
     * proses hapus
     */
    public function destroy($id)
    {
        // get data user berdasarkan id
        $users = User::find($id);

        // delete file dari storage
        $delete = Storage::delete('public/avatars/' . $users->avatar);

        // delete data pada databsae
        $users->delete();
        return redirect('/users-setting')->with('toast_success', 'Data Deleted Successfully');
    }


    // update profil (khusus setting profil individu)

    /**
     * profil
     */
    public function profil($id)
    {
        // get data berdasarkan id
        $users = User::where('id', $id)->get();

        // pashing data ke view
        return view('users.usersProfil', compact('users'));
    }

    public function profilUpdate(Request $request)
    {
        /* dd($request->all()); */
        $message = [
            'required' => 'Cannot be empty!',
            'unique' => 'Email already used!',
            'email' => 'Must be accompanied @',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numeric',
            'mimes' => 'Format not found: jpeg,png,jpg',
            'max' => 'Maximum 2 Mb',
        ];
        $request->validate(
            [
                'name' => 'required|min:2',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'email' => 'required',
            ],
            $message
        );

        // get user berdasarkan id
        $users = User::where('id', $request->id)->first();

        // cek jika update avatar
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
        ]);

        return back()->with('toast_success', 'Data Successfully Updated');
    }

    public function password(Request $request)
    {
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('password'), $auth->password)) {
            return back()->with('toast_error', "Current Password is Invalid");
        }

        // Current password and new password same
        if (strcmp($request->get('password'), $request->newPassword) == 0) {
            return redirect()->back()->with("toast_error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->newPassword);
        $user->save();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('toast_success', "The password has been changed successfully, please login again!");
    }
}
