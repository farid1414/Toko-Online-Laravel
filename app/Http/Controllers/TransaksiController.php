<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // page detail pembelian produk
    public function index()
    {
        return view('pages.pembelian');
    }

    // page detail pembelian produk
    public function detailPembelian()
    {
        return view('pages.detail-pembelian');
    }
}