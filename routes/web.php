<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth', 'checkrole: Staff']], function(){
    Route::get('/staff', [DashboardController::class, 'index']);
});
Route::group(['middleware' => ['auth', 'checkrole:Administrator,Superadmin']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
Route::group(['middleware' => ['auth', 'checkrole:Superadmin']], function(){
    Route::get('/user', fn () => 'halaman user');
});

Route::get('/logout', [AuthController::class, 'logout']);

