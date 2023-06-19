<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarouselsController extends Controller
{
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
        // validation
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
        // format nama file
        $bannerName = 'Banner_' . time() . '.' . $request->banner->getClientOriginalExtension();

        // insert gambar ke storage
        $path = Storage::putFileAs('public/banner', $request->file('banner'), $bannerName);

        // create data
        $users = Carousels::create([
            'name' => $request->name,
            'banner' => $bannerName,
            'created_by' =>  Auth::user()->id,
            'verified_by' =>  Auth::user()->id,
            'verified_at' => now()
        ]);
        return redirect('/carousels')->with('toast_success', 'Data Saved Successfully');
    }

    // delete
    public function destroy($id)
    {
        // cari data berdasarkan id
        $carousels = Carousels::find($id);

        // hapus file pada storage
        $delete = Storage::delete('public/banner/' . $carousels->banner);

        // hapus data pada database
        $carousels->delete();
        return redirect('/carousels')->with('toast_success', 'Delete succesfully');
    }

    // proses accepted
    public function acepted(Request $request)
    {
        // cari data berdasarkan id
        $carousels = Carousels::where('id', $request->id)->first();
        // dd($carousels);

        // update data
        $carousels->update([
            'is_active' => 2,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/carousels')->with('toast_success', 'Banner accepted succesfully');
    }

    // proses decline
    public function decline(Request $request)
    {
        // cari data berdasarkan id
        $carousels = Carousels::where('id', $request->id)->first();
        // dd($carousels);

        // update data
        $carousels->update([
            'is_active' => 3,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/carousels')->with('toast_success', 'Banner rejected succesfully');
    }
}
