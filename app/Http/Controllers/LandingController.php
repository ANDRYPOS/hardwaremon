<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //landing page
    public function index()
    {
        //
        // return view('index');
        $products = Products::with('categories')->get();
        $categori = Products::select('category_id')->groupby('category_id')->get();
        $carousels = Carousels::all();

        // pashing data ke view bawa data product(join user dan categories), dan data categories
        return view('index', compact(['products', 'carousels', 'categori']));
    }

    // range harga products
    public function range(Request $request)
    {
        $startPrice =  $request->priceMin;
        $endPrice =  $request->priceMax;

        $products = Products::with('categories')->select('*')->whereBetween('price', [$startPrice, $endPrice])->get();
        $categori = Products::select('category_id')->groupby('category_id')->get();
        $carousels = Carousels::all();

        // dd("Start :" . $startPrice, "End :" . $endPrice);
        // dd($cari);
        return view('index', compact(['products', 'categori', 'carousels']));
    }
}
