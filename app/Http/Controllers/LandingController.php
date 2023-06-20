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
        // data products dan relasi categories
        $products = Products::with('categories')->get();

        // get data id categories pada products
        $categori = Products::select('category_id')->groupby('category_id')->get();

        // get data carousels pada dtabase
        // $carousels = Carousels::all();
        $carousels = Carousels::where('is_active', '2')->get();
        // dd($carousels);

        // pashing data keview index(landing)
        return view('index', compact(['products', 'carousels', 'categori']));
    }
}
