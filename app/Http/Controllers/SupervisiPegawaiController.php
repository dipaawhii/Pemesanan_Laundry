<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SupervisiPegawaiController extends Controller
{
    public function index(): View
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('users.email', 'users.level', 'pegawai.*')
            ->get();
        return view('levelSupervisi.pegawai.index', compact('pegawai'));
    }

    public function show(string $id): View
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->select('users.email', 'users.level', 'pegawai.*')
            ->where('pegawai.id_pegawai', $id)
            ->first();
        return view('levelSupervisi.pegawai.show', compact('pegawai'));
    }
}
