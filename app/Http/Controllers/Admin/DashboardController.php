<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction;

class DashboardController extends Controller
{
    //page dashboard
    public function dashboard(){
        $user=User::count();
        $pendapatan=Transaction::sum('total_price');
        $transaksi=Transaction::count();
        return view('pages.admin.dashboard-admin', compact('user','pendapatan','transaksi'));
    }
}