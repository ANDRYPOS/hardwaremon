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
        //
        $products = Products::all();
        $productCount = $products->count();
        $productsActive = Products::where('status_id', 2)->get()->count();

        $carousels = Carousels::all();
        $carouselsCount = $carousels->count();
        $carouselsActive = Carousels::where('is_active', 2)->get()->count();

        return view('dashboard', compact(['products', 'productCount', 'carousels', 'carouselsCount', 'carouselsActive', 'productsActive']));
    }

    // accepted product in dashboard
    public function productsAcepted(Request $request)
    {
        $products = Products::where('id', $request->id)->first();
        // dd($products);

        $products->update([
            'status_id' => 2,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/dashboard')->with('toast_success', 'Product accepted succesfully');
    }

    // decline product in dashboard
    public function productsDecline(Request $request)
    {
        $products = Products::where('id', $request->id)->first();
        // dd($products);

        $products->update([
            'status_id' => 3,
            'verified_by' => Auth::user()->id
        ]);
        return redirect('/dashboard')->with('toast_success', 'Product accepted succesfully');
    }
}
