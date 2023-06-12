<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $categories = Categories::all();
        // tampilkan data table serta join (categories(id->category_id), users(id->createdby & verified_by))
        $products = Products::with(['users', 'usersVerified', 'categories', 'status'])->get();

        // pashing data ke view bawa data product(join user dan categories), dan data categories
        return view('products.products', compact(['products', 'categories']));
    }

    /**
     * tampil halaman setting
     */
    public function setting()
    {
        //
        //panggil tb users untuk insert data products dropdown creatd by verified_by
        $users = User::all();
        //panggil tb categories untuk insert data products dropdown category_id
        $categories = Categories::all();
        $products = Products::all();
        /* dd($products); */
        return view('products.productsSetting', compact(['products', 'categories', 'users']));
    }

    /**
     * tampil halaman create.
     */
    public function create()
    {
        //

        //panggil tb users untuk insert data products dropdown creatd by verified_by
        $users = User::all();
        //panggil tb categories untuk insert data products dropdown category_id
        $categories = Categories::all();
        $products = Products::all();
        /* $status = products::where('role')->get();
        dd($status);  */      /* dd($products); */
        return view('products.productsCreate', compact(['products', 'categories', 'users']));
    }

    /**
     * proses simpan create
     */
    public function store(Request $request)
    {
        //
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
                'category_id' => 'required',
                'name' => 'required|min:2',
                'description' => 'required|min:2',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2024',
            ],
            $message
        );

        $imageName = 'products_' . time() . '.' . $request->image->getClientOriginalExtension();
        $path = Storage::putFileAs('public/products_img', $request->file('image'), $imageName);
        $products = Products::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'created_by' => Auth::user()->id,
            'verified_by' => Auth::user()->id,
            'verified_at' => now()
        ]);
        return redirect('/products-setting')->with('toast_success', 'Data Berhasil Disimpan');
    }

    /**
     * tampil halaman edit
     */
    public function edit($id)
    {
        $users = User::all();
        $categories = Categories::all();
        /* dd($products); */
        $products = Products::with(['categories'])->get();
        $products = Products::where('id', $id)->get();
        /* dd($products); */
        return view('products.productsEdit', compact(['products', 'categories', 'users']));
    }

    /**
     * proses update
     */
    public function update(Request $request)
    {
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
                'category_id' => 'required',
                'name' => 'required|string|min:2',
                'description' => 'required|string|min:2',
                'price' => 'required|numeric',
                'image' => 'image|mimes:jpeg,png,jpg|max:2024',
            ],
            $message
        );

        $products = Products::where('id', $request->id)->first();
        // dd($request->all());
        // dd($products);
        // cek apakah update file
        if ($request->hasFile('image')) {
            // jika update hapus file lama
            $delete = Storage::delete('public/products_img/' . $products->image);
            // dd($delete);

            // update file dengan yg baru
            $name = $request->file('image');
            $imageName = 'products_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/products_img', $request->file('image'), $imageName);

            $products->update([
                'image' => $imageName,
            ]);
        }

        // update database
        $products->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'created_by' => Auth::user()->id,
            'verified_by' => Auth::user()->id,
            'verified_at' => now()
        ]);
        return redirect('/products-setting')->with('toast_success', 'Data Berhasil Diupdate');
    }


    /**
     * proses hapus
     */
    public function destroy($id)
    {
        //
        // dd($id);
        // $products = products::find($id)->delete();
        $products = Products::find($id);
        $delete = Storage::delete('public/products_img/' . $products->image);

        $products->delete();
        return redirect('/products-setting')->with('toast_success', 'Data Berhasil Didelete');
    }

    public function destroyDashboard($id)
    {
        //
        // dd($id);
        // $products = products::find($id)->delete();
        $products = Products::find($id);
        $delete = Storage::delete('public/products_img/' . $products->image);

        $products->delete();
        return redirect('/dashboard')->with('toast_success', 'Data Berhasil Didelete');
    }
}
