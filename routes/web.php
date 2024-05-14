<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);
Route::resource('/laundryMember', \App\Http\Controllers\laundryMemberController::class);
Route::resource('/pembelian', \App\Http\Controllers\PembelianController::class);
