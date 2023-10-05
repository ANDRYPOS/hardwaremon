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
    /**
     * tampil form setting
     */
    public function setting()
    {
        //panggil tb users untuk insert data products dropdown creatd by verified_by
        $users = User::all();

        //panggil tb categories untuk insert data products dropdown category_id
        $categories = Categories::all();

        // get data products
        $products = Products::all();
        // dd($products);

        //count
        $waiting = Products::where('status_id', 1)->get();
        $rejected = Products::where('status_id', 3)->get();
        $acepted = Products::where('status_id', 2)->get();
        /* dd($products); */
        return view('products.productsSetting', compact(['products', 'categories', 'users', 'waiting', 'rejected', 'acepted']));
    }

    /**
     * tampil list acepted
     */
    public function acepted()
    {
        //panggil tb users untuk insert data products dropdown creatd by verified_by
        $users = User::all();

        //panggil tb categories untuk insert data products dropdown category_id
        $categories = Categories::all();

        // get data products
        $products = Products::where('status_id', 2)->get();

        //count
        $waiting = Products::where('status_id', 1)->get();
        $rejected = Products::where('status_id', 3)->get();
        $acepted = Products::where('status_id', 2)->get();
        /* dd($products); */
        return view('products.productsSetting', compact(['products', 'categories', 'users', 'waiting', 'rejected', 'acepted']));
    }

    /**
     * tampil list waiting
     */
    public function waiting()
    {
        //panggil tb users untuk insert data products dropdown creatd by verified_by
        $users = User::all();

        //panggil tb categories untuk insert data products dropdown category_id
        $categories = Categories::all();

        // get data products
        $products = Products::where('status_id', 1)->get();

        //count
        $waiting = Products::where('status_id', 1)->get();
        $rejected = Products::where('status_id', 3)->get();
        $acepted = Products::where('status_id', 2)->get();
        /* dd($products); */
        return view('products.productsSetting', compact(['products', 'categories', 'users', 'waiting', 'rejected', 'acepted']));
    }

    /**
     * tampil list rejected
     */
    public function rejected()
    {
        //panggil tb users untuk insert data products dropdown creatd by verified_by
        $users = User::all();

        //panggil tb categories untuk insert data products dropdown category_id
        $categories = Categories::all();

        // get data products
        $products = Products::where('status_id', 3)->get();

        //count
        $waiting = Products::where('status_id', 1)->get();
        $rejected = Products::where('status_id', 3)->get();
        $acepted = Products::where('status_id', 2)->get();
        /* dd($products); */
        return view('products.productsSetting', compact(['products', 'categories', 'users', 'waiting', 'rejected', 'acepted']));
    }

    /**
     * action jempol accepted
     */
    public function productsAcepted(Request $request)
    {
        $products = Products::where('id', $request->id)->first();
        // dd($products);

        $products->update([
            'status_id' => 2,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/products-setting')->with('toast_success', 'Product accepted succesfully');
    }

    /**
     * action jempol rejected
     */
    public function productsDecline(Request $request)
    {
        $products = Products::where('id', $request->id)->first();
        // dd($products);

        $products->update([
            'status_id' => 3,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/products-setting')->with('toast_success', 'Product succesfully rejected');
    }
    /**
     * tampil halaman create.
     */
    public function create()
    {
        //panggil tb users untuk insert data products dropdown creatd by verified_by
        $users = User::all();

        //panggil tb categories untuk insert data products dropdown category_id
        $categories = Categories::all();

        // get data products
        $products = Products::all();

        return view('products.productsCreate', compact(['products', 'categories', 'users']));
    }

    /**
     * proses simpan create
     */
    public function store(Request $request)
    {
        //validation
        $message = [
            'required' => 'Cannot be empty!',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numbers',
            'mimes' => 'File format not found : jpeg,png,jpg',
            'max' => 'Maximum 2 MB'
        ];

        $request->validate(
            [
                'category_id' => 'required',
                'name' => 'required|min:2',
                'description' => 'required|min:2',
                'price' => 'required|numeric',
                'qty' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2024',
            ],
            $message
        );

        // test dumper
        /* dd($request->qty); */

        // convert nama file
        $imageName = 'products_' . time() . '.' . $request->image->getClientOriginalExtension();

        // masukkan file ke storage
        $path = Storage::putFileAs('public/products_img', $request->file('image'), $imageName);

        // create data
        $products = Products::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'qty' => $request->qty,
            'value' => ($request->qty * $request->price),
            'image' => $imageName,
            'created_by' => Auth::user()->id,
            'verified_by' => Auth::user()->id,
            'verified_at' => now()
        ]);
        return redirect('/products-setting')->with('toast_success', 'Data Saved Successfully');
    }

    /**
     * tampil halaman edit
     */
    public function edit($id)
    {
        // get data user
        $users = User::all();

        // get data categories
        $categories = Categories::all();

        // get data products dengan relasi categories
        $products = Products::with(['categories'])->get();

        // get data products berdasarkan id
        $products = Products::where('id', $id)->get();

        // tampilkan view
        return view('products.productsEdit', compact(['products', 'categories', 'users']));
    }

    /**
     * proses update
     */
    public function update(Request $request)
    {
        // validation
        $message = [
            'required' => 'Cannot be empty!',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numbers',
            'mimes' => 'File format not found : jpeg,png,jpg',
            'max' => 'Maximum 2 MB'
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

        // get data products berdasarkan id
        $products = Products::where('id', $request->id)->first();

        // cek apakah update file
        if ($request->hasFile('image')) {

            // jika update hapus file lama
            $delete = Storage::delete('public/products_img/' . $products->image);

            // update file dengan yg baru
            $name = $request->file('image');

            // convert nama file
            $imageName = 'products_' . time() . '.' . $name->getClientOriginalExtension();

            // update file pada storage
            $path = Storage::putFileAs('public/products_img', $request->file('image'), $imageName);

            // update data
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
        return redirect('/products-setting')->with('toast_success', 'Data Successfully Updated');
    }

    /**
     * proses hapus
     */
    public function destroy($id)
    {
        // get data products brdasarkan id
        $products = Products::find($id);

        // delete file pada storage
        $delete = Storage::delete('public/products_img/' . $products->image);

        // delete data berdasarkan id
        $products->delete();
        return redirect('/products-setting')->with('toast_success', 'Data Deleted Successfully');
    }
}
