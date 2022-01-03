<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function username()
    {
        return 'username';
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/';

  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function cekLogin(Request $request)
    {
        $ingat = $request->remember ? true : false;
        $up = $request->only('username','password');

        if (Auth::attempt($up, $ingat)) {
            return redirect()->route('beranda/index');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
 
        $request->session()->flush();
 
        $request->session()->regenerate();
 
        return redirect('/login')
            ->withSuccess('Terimakasih, selamat datang kembali!');
    }

}

