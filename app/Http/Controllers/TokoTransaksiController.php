<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoTransaksiController extends Controller
{
    //page transaksi
    public function index()
    {
        return view ('pages.toko.transaksi');
    }
    // page deatil transaksi
    public function detailTransaksi()
    {
        return view('pages.toko.detail-transaksi');
    }
}
