<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return redirect('login');
    }

    function toLogin() {
        if(Auth::check()){
            // dd(Auth::check());
            return redirect('admin/dashboard');
        }

        $page_title ="Halaman Login";
        return view ('admin/v_login', ["page_title"=> $page_title]);
    }

    function signinLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }
        
        // return redirect("/login")->with('gagal','Login anda gagal');
        Session::flash('status', 'failed');
        Session::flash('message', 'Login gagal, email atau password salah');
        return redirect ('/login');
    }

    public function logOut(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
        // return redirect('admin/auth');
    }
}
