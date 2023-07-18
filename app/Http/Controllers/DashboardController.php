<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //tampil dashboard
    public function index()
    {
        //card info products for admin
        $productCount = Products::all()->count();
        $productsActive = Products::where('status_id', 2)->get()->count();

        //list card product for user
        $products = Products::where('status_id', 2)->get();

        //card info banner for admin
        $carousels = Carousels::all();
        $carouselsCount = $carousels->count();
        $carouselsActive = Carousels::where('is_active', 2)->get()->count();

        // get data id categories pada products
        $categori = Products::select('category_id')->where('status_id', '2')->groupby('category_id')->get();

        //get data untuk kondisi filter all
        $filterAll = $categori->first();

        return view('dashboard', compact(['products', 'productCount', 'carousels', 'carouselsCount', 'carouselsActive', 'productsActive', 'categori', 'filterAll']));
    }
}
