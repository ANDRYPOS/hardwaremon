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
        //get data categories dari database
        $categories = Categories::all();

        // tamplkan data ke view
        return view('categories.categoriesSetting', compact('categories'));
    }

    // tampil form create
    public function create()
    {
        // get data categories dari database
        $categories = Categories::all();

        // tampilkan halaman create
        return view('categories.categoriesCreate', compact('categories'));
    }

    // proses simpan
    public function store(Request $request)
    {
        //
        /* dd($request->all()); */

        // valdation
        $message = [
            'required' => 'Cannot be empty!',
            'min' => 'Minimal 2 karakter',
            'unique' => 'The name is already in use!',
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
            return redirect('/categories-setting')->with('toast_success', 'Data Saved Successfully');
        }
    }

    // tampil form edit
    public function edit($id)
    {
        // get data untuk di edit berdasarkan id
        $categories = Categories::where('id', $id)->get();
        return view('categories.categoriesEdit', compact('categories'));
    }

    // proses update
    public function update(Request $request)
    {
        //
        /* dd($request->all()); */

        // validation
        $message = [
            'required' => 'Cannot be empty!',
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
            return redirect('/categories-setting')->with('toast_success', 'Data Successfully Updated');
        }
        // jika sudah digunakan maka gagal update
        return redirect('/categories-setting')->with('toast_success', 'No Data Updates');
    }

    // proses delete
    public function destroy($id)
    {
        // dd($id);
        // get data berdasarkan id categroeis dan delete
        $categories = Categories::find($id)->delete();

        // jika berhasil maka tampil notifikasi berhasil
        if ($categories) {
            return redirect('/categories-setting')->with('toast_success', 'Data Deleted Successfully');
        }

        // jika gagal maka tampil notifikasi gagal
        return redirect('/categories-setting')->with('error', 'Gagal hapus!');
    }
}
