<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    //
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

    public function setting()
    {
        //
        $categories = Categories::all();
        /* dd($categories); */
        return view('categories.categoriesSetting', compact('categories'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('categories.categoriesCreate', compact('categories'));
    }

    public function store(Request $request)
    {
        //
        /* dd($request->all()); */
        $message = [
            'required' => 'Tidak boleh kosong!',
            'alpha' => 'Harus berisi teks',
            'min' => 'Minimal 2 karakter',
            'unique' => 'Nama sudah digunakan',
        ];

        $request->validate(
            [
                'name' => 'required|min:2|unique:categories,name',
            ],
            $message
        );

        // ambil request input
        $namaCategories = $request->name;

        // cek ke database apakah data sudah ada
        $cekDB = Categories::where('name', '=', $namaCategories)->count();

        // eksekusi kondisi
        if (!$cekDB) {
            // jika nama belum digunakan maka lanjutkan insert
            $categories = Categories::create([
                'name' => $namaCategories
            ]);
            return redirect('/categories-setting')->with('toast_success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id)
    {
        $categories = Categories::where('id', $id)->get();
        return view('categories.categoriesEdit', compact('categories'));
    }

    public function update(Request $request)
    {
        //
        /* dd($request->all()); */

        $message = [
            'required' => 'Tidak boleh kosong!',
            'alpha' => 'Harus berisi teks',
            'min' => 'Minimal 2 karakter',
        ];

        $request->validate(
            [
                'name' => 'required|min:2',
            ],
            $message
        );

        // ambil request input
        $namaCategories = $request->name;

        // cek ke database apakah data sudah ada
        $cekDB = Categories::where('name', '=', $namaCategories)->count();
        if (!$cekDB) {
            $categories = Categories::find($request->id)->update([
                'name' => $request->name,
            ]);
            return redirect('/categories-setting')->with('toast_success', 'Data Berhasil Diupdate');
        }
        // jika sudah digunakan maka gagal update
        return redirect('/categories-setting')->with('toast_success', 'Tidak Ada Data Update');
    }

    public function destroy($id)
    {
        //

        // dd($id);
        $categories = Categories::find($id)->delete();
        if ($categories) {
            return redirect('/categories-setting')->with('toast_success', 'Data Berhasil Didelete');
        }
        return redirect('/categories-setting')->with('error', 'Gagal hapus!');
    }
}
