<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    //   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index($slug){
        $produk = Product::Where('slug', $slug)->first();
        $idProduk = $produk->id;

        $getProduks = Product::findOrFail($idProduk);
        return view('pages.details', compact('getProduks'));
    }

    public function addToCard(Request $request , $id){
        $product = Product::findOrFail($id);
        // $products = Product::findOrFail($product->id);
        // $cards = Carts::where('products_id', $products->id)->first();
        $cards = Carts::Where('users_id', Auth()->user()->id)->get();

        if($cards->count() == 0){
            $data['products_id'] = $product->id;
            $data['users_id']= Auth()->user()->id;
            $data['quantity'] = $request->quantity;

            Carts::create($data);
            Session::flash('sukses','Anda Berhasil Menambahkan ke Keranjang');
            return redirect()->route("card");
        }
        else{
            foreach($cards as $card){
                if($card->products_id == $product->id){
                Session::flash('gagal','Sudah ada di keranjang');
                return redirect()->route("card");
                die();
                }
                else {
                    $data['products_id'] = $product->id;
                    $data['users_id']= Auth()->user()->id;
                    $data['quantity'] = $request->quantity;

                    Carts::create($data);
                    Session::flash('sukses','Anda Berhasil Menambahkan ke Keranjang');
                    return redirect()->route("card");
                    die();
                }
            }

        }

    }
}
