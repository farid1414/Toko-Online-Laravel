<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Carts;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception;

// library midtrans
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function checkoutCart(Request $request)
    {
        // dd($request->total_price);
        // die();
        // save data alamat user
        $user = Auth::user();
        $user->update($request->except('total_price')); // update alamat user sesuai ketika chekout

        // proses checkout
        $code = 'FARIDSTORE' . mt_rand(00000, 99999); //membuat code random
        // mengambil data cart sesuai dengan user id login
        $carts = Carts::with(['product','user'])->where('users_id',Auth::user()->id)->get();

        // dd($request->all());
        // die();

        // mengisi tabel transaction
        $transaction = Transaction::create([
            'users_id' =>Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' =>$request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        // mengisi tabel transaction detail
        foreach($carts as $cart){
            $codeTsDetail = 'FARIDSTORE' . mt_rand(00000, 99999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
                'resi' => '',
                'shipping_status' => 'PENDING',
                'code' => $codeTsDetail,
            ]);
        }

        // Mengahpus cart yabg sudah ada setelah transaksi berhasil
        Carts::where('users_id', Auth::user()->id)->delete();

        // konfigurasi dengan midtrans
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        // array untuk mengirimkan hasil transaksi kedalam midtrans

        // deklarasi array dengan nama $Midtrans
        $midtrans = [
                'transaction_details' => [
                    'order_id' => $code,
                    'gross_amount' => (int) $request->total_price,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,

                ],
                'enabled_payments' => [
                    'gopay', 'permata_va','shopeepay','bank_transfer',
                ],
                'vtweb' => []
            ];

        //membuat transaksi
        try {
        // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            }
        catch (Exception $e) {
            echo $e->getMessage();
            }

    }
}