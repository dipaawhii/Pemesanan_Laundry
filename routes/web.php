<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanMemberController;
use App\Http\Controllers\KaryawanNonMemberController;
use App\Http\Controllers\LaundryMemberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberLaundryMemberController;
use App\Http\Controllers\NonMemberController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupervisiPegawaiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'administratorAccess'])->name('admin.')->group(function () {
    Route::resource('/administrator/pengguna', UserController::class);
    Route::resource('/administrator/pegawai', PegawaiController::class);
    Route::resource('/administrator/member', MemberController::class);
    Route::resource('/administrator/pembelian', PembelianController::class);
    Route::resource('/administrator/laundry_member', LaundryMemberController::class);
    Route::resource('/administrator/laundry_non_member', NonMemberController::class);
    Route::resource('/administrator/barang', BarangController::class);
    Route::get('/administrator/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'karyawanAccess'])->name('karyawan.')->group(function () {
    Route::resource('/karyawan/laundry_member', KaryawanMemberController::class);
    Route::resource('/karyawan/laundry_non_member', KaryawanNonMemberController::class);
    Route::get('/karyawan/dashboard', [DashboardController::class, 'karyawanDashboard'])->name('karyawan.dashboard');
});

Route::middleware(['auth', 'supervisiAccess'])->name('supervisi.')->group(function () {
    Route::resource('/supervisi/pegawai', SupervisiPegawaiController::class);
    Route::get('/supervisi/dashboard', [DashboardController::class, 'supervisiDashboard'])->name('supervisi.dashboard');
});

Route::middleware(['auth', 'memberAccess'])->name('member.')->group(function () {
    Route::resource('/member/laundry_member', MemberLaundryMemberController::class);
    Route::get('/member/dashboard', [DashboardController::class, 'memberDashboard'])->name('member.dashboard');
});
