<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResgisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view ('pages.login');
    }
    public function register(){
        return view ('pages.register');
    }
    public function postRegister(ResgisterRequest $request)
    {
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->roles ="USER";
        $user->remember_token = Str::random(60);
        $user->save();

        Session::flash('sukses','Selamat Email Anda terdaftar silahkan login terlebih dahulu');
        return redirect()->route('login');
    }

    public function postLogin(LoginRequest $request)
    {
         $credential = $request->only('email','password');

            if (Auth::attempt($credential)) {
                $user = Auth::user();
                if ($user->roles == 'USER') {
                    return redirect()->route('home');
                }
                return redirect()->route('/');
            }
            Session::flash('gagal','Email atau kata sandi anda salah');
            return redirect()->route('login');
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}