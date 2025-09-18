<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;

class VerificationController extends Controller
{
    public function index() {
        return view('verification.index');
    }

    public function store(Request $request) {
        $user = null;
        if($request->type == 'register') {
            $user = User::find($request->user()->id);
        }else{
            //user = reset password
            // $user = ... (logika reset password di sini)
        }
        if(!$user) return back()->with('error', 'User not found');
        $otp = rand(100000, 999999);
        $verify = Verification::create([
            'user_id' => $user->id,
            'unique_id' => uniqid(),
            'otp' => md5($otp),
            'type' => $request->type,
            'send_via' => 'email'
        ]);
        // Pastikan queue driver di .env bukan sync, misal: QUEUE_CONNECTION=database
        // Jalankan worker: php artisan queue:work
        // Untuk testing cepat, bisa pakai MAIL_MAILER=log di .env
        Mail::to($user->email)->queue(new OtpEmail($otp));
        if($request->type == 'register') {
            return redirect('/verify/'. $verify->unique_id);
        }
        // return redirect('/reset-password/'. $verify->unique_id);
    }
}

