<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    //tampil form categories
    public function setting()
    {
        //
        $categories = Categories::all();
        /* dd($categories); */
        return view('categories.categoriesSetting', compact('categories'));
    }

    // tampil form create
    public function create()
    {
        $categories = Categories::all();
        return view('categories.categoriesCreate', compact('categories'));
    }

    // proses simpan
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

    // tampil form edit
    public function edit($id)
    {
        $categories = Categories::where('id', $id)->get();
        return view('categories.categoriesEdit', compact('categories'));
    }

    // proses update
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

    // proses delete
    public function destroy($id)
    {
        // dd($id);
        $categories = Categories::find($id)->delete();
        if ($categories) {
            return redirect('/categories-setting')->with('toast_success', 'Data Berhasil Didelete');
        }
        return redirect('/categories-setting')->with('error', 'Gagal hapus!');
    }
}
