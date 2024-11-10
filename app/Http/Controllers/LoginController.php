<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');  // Redirect ke halaman setelah logout
    }
}
