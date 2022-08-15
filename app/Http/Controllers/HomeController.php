<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categori;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categori::take(6)->get();
        $products = Product::with('galleries')->take(12)->latest()->get();
        return view('pages.home', compact('categories','products' ));
    }
}
