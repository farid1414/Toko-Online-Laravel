<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoProdukController extends Controller
{
    //page index
    public function index(){
        return view ('pages.toko.produk');
    }
    // page tambah produk
    public function tambahProduk(){
        return view ('pages.toko.tambah-produk');
    }
    // page edit produk
    public function editProduk(){
        return view ('pages.toko.edit-produk');
    }
}