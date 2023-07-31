<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return view('admin/v_dashboard', [
            'page_title'  => 'Dashboard',
            'page_header' => 'Dashboard',
            'user' =>$user,
        ]);
    }

    // public function index(){
    //     // $roles=Role::first();
    //     $user = User::with('role')->first();
    //     // dd($user);
    //     return view('layout.home', compact('user'));
    // }
}
