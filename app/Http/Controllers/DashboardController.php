<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        // Cek role user
        if (Auth::user() && Auth::user()->role === 'Staff') {
            return view('staff.dashboard');
        }
        return view('dashboard');
    }
}
