<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarouselsController extends Controller
{
    //
    public function index()
    {
        //
        /* $carousels = carousels::all(); */
        $carousels = Carousels::with(['usersCreated', 'usersVerified', 'status']);
        return view('index', compact('carousels'));
    }

    public function setting()
    {
        $carousels = Carousels::all();
        $carouselsCount = $carousels->count();
        return view('carousels.carouselsSetting', compact(['carousels', 'carouselsCount']));
    }

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

    public function edit($id)
    {
        // dd($id);
        $carousels = Carousels::where('id', $id)->get();
        return view('carousels.carouselsEdit', compact('carousels'));
    }

    public function update(Request $request)
    {
        // dd($request->all());

        $message = [
            'required' => 'Tidak boleh kosong',
            'alpha' => 'Harus berisi text',
            'min' => 'Minimal 2 digit',
            'numeric' => 'Harus berisi angka',
            'mimes' => 'Format file tidak ditemukan : jpeg,png,jpg',
            'max' => 'Maximal 2 MB'
        ];

        $request->validate(
            [
                'name' => 'required|min:2',
                'banner' => 'max:2024|mimes:jpeg,png,jpg'
            ],
            $message
        );

        $carousels = Carousels::where('id', $request->id)->first();
        // dd($carousels);
        if ($request->hasFile('banner')) {

            // hapus file
            $delete = Storage::delete('public/banner/' . $carousels->banner);

            // masukkan file baru
            $name = $request->file('banner');
            $imageName = 'banner_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/banner', $request->file('banner'), $imageName);
            $carousels->update([
                'name' => $request->name,
                'banner' => $imageName,
            ]);
        }
        $carousels->update([
            'name' => $request->name,
            'created_by' =>  Auth::user()->id,
            'verified_by' =>  Auth::user()->id,
        ]);
        return redirect('/carousels')->with('toast_success', 'Data Berhasil Diupdate');
    }

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
