<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function index() {
        return view('verification.index');
    }
    public function show($unique_id) {
        $verify = Verification::whereUserId(Auth::user()->id)->whereUniqueId($unique_id)
        ->whereStatus('Active')->count();
        if(!$verify) abort(404);
        return view('verification.show', compact('unique_id'));
    }

    public function update(Request $request, $unique_id) {
         $verify = Verification::whereUserId(Auth::user()->id)->whereUniqueId($unique_id)
        ->whereStatus('Active')->first();
        if(!$verify) abort(404);
        if(md5($request->otp) !== $verify->otp) {
            $verify->update(['status' => 'Invalid']);
            return back()->with('failed', 'Invalid OTP');
        }
        $verify->update(['status' => 'valid']);
        User::find($verify->user_id)->update(['status' => 'active']);
        return redirect('/staff');
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

