<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoController extends Controller
{
    //page dashboard toko
    public function dashboard()
    {
        return view('pages.toko.dashboard');
    }
    // page pengaturan toko
    public function pengaturanToko()
    {
        return view('pages.toko.pengaturan-toko');
    }

}
