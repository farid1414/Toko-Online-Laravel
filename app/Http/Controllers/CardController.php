<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    public function index()
    {
        $cards =Carts::Where('users_id', Auth()->user()->id)->get();
        return view('pages.card', compact('cards'));
    }
    // function delete card
    public function deleteCard(Request $request, $id)
    {
        $card = Carts::findOrFail($id);

        $card->delete();

        Session::flash('sukses','Berhasil Mengahpus Item');
        return redirect()->route("card");
    }
    // function untuk page succes
    public function success()
    {
        return view('pages.succes');
    }
    // function untuk page register succes
    public function regisSuccess()
    {
        return view('pages.register-success');
    }

}