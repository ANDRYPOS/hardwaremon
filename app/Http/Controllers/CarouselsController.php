<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarouselsController extends Controller
{
    //tampil data carousels dilanding
    public function index()
    {
        //
        /* $carousels = carousels::all(); */
        /* $carousels = Carousels::with(['usersCreated', 'usersVerified', 'status']);
        return view('index', compact('carousels')); */
    }

    // tampil data carousels di form
    public function setting()
    {
        $carousels = Carousels::all();
        $carouselsCount = $carousels->count();
        return view('carousels.carouselsSetting', compact(['carousels', 'carouselsCount']));
    }

    // simpan input data carousels
    public function store(Request $request)
    {
        // dd($request->all());
        $message = [
            'required' => 'Tidak boleh kosong',
            'mimes' => 'Format tidak sesuai: jpeg,png,jpg',
            'max' => 'Max 2 Mb',
            'min' => 'Minimal 2 karakter'
        ];
        $request->validate(
            [
                'name' => 'required|min:2',
                'banner' => 'required|image|mimes:jpeg,png,jpg|max:2024',
            ],
            $message
        );
        $bannerName = 'Banner_' . time() . '.' . $request->banner->getClientOriginalExtension();
        $path = Storage::putFileAs('public/banner', $request->file('banner'), $bannerName);
        // $request->banner->move(public_path('storage/banner'), $bannerName);
        $users = Carousels::create([
            'name' => $request->name,
            'banner' => $bannerName,
            'created_by' =>  Auth::user()->id,
            'verified_by' =>  Auth::user()->id,
            'verified_at' => now()
        ]);
        return redirect('/carousels')->with('toast_success', 'Data Berhasil Disimpan');
    }

    // delete
    public function destroy($id)
    {
        //
        // dd($id);

        // cari id
        $carousels = Carousels::find($id);

        // hapus file
        $delete = Storage::delete('public/banner/' . $carousels->banner);

        // hapus data
        $carousels->delete();
        return redirect('/carousels')->with('toast_success', 'Delete succesfully');
    }

    // proses accepted
    public function acepted(Request $request)
    {
        $carousels = Carousels::where('id', $request->id)->first();
        // dd($carousels);

        // dd($carousels);
        $carousels->update([
            'is_active' => 2,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/carousels')->with('toast_success', 'Banner accepted succesfully');
    }

    // proses decline
    public function decline(Request $request)
    {
        $carousels = Carousels::where('id', $request->id)->first();
        // dd($carousels);
        $carousels->update([
            'is_active' => 3,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/carousels')->with('toast_success', 'Banner rejected succesfully');
    }
}
