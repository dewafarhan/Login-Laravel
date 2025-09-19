<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => view('auth.login'))->name(name: 'login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', fn () => view('auth.register'))->name(name: 'register');
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth', 'checkrole:Staff']], function () {
    Route::get('/verify', [VerificationController::class, 'index']);
    Route::post('/verify', [VerificationController::class, 'store']);
    Route::get('/verify/{unique_id}', [VerificationController::class, 'show']);
    Route::put('/verify/{unique_id}', [VerificationController::class, 'update']);
});

Route::group(['middleware' => ['auth', 'checkrole:Staff', 'checkstatus']], function(){
    Route::get('/staff', [DashboardController::class, 'index']);
});
Route::group(['middleware' => ['auth', 'checkrole:Superadmin,Administrator']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
Route::group(['middleware' => ['auth', 'checkrole:Superadmin,Administrator']], function(){
    Route::get('/user', fn () => 'halaman user');
});

Route::group(['middleware' => ['auth', 'checkrole:Superadmin,Administrator']], function(){
    Route::resource('users', UserController::class);
});

Route::get('/logout', [AuthController::class, 'logout']);

