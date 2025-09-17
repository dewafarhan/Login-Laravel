<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:50'
        ]);
        if(Auth::attempt($request->only('email', 'password'), $request->remember)){
            if(Auth::user()->role == 'Staff') return redirect('/staff');
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'email' => 'failed', 'Email or Password is incorrect'
        ]);
    }
    public function logout() {
        Auth::logout(Auth::user());
        return redirect('/login');
    }
}
