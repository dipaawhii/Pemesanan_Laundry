<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class KaryawanNonMemberController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $laundry_non_member = DB::table('datalaundrynonmember')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrynonmember.id_pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->select('pegawai.nama_pegawai', 'datalaundrynonmember.*')
            ->where('users.id', $id)
            ->get();
        return view('levelKaryawan.laundryNonMember.index', compact('laundry_non_member'));
    }

    public function show(string $id): View
    {
        $laundry_non_member = DB::table('datalaundrynonmember')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrynonmember.id_pegawai')
            ->select('pegawai.nama_pegawai', 'datalaundrynonmember.*')
            ->where('datalaundrynonmember.no_transaksi', $id)
            ->first();
        return view('levelKaryawan.laundryNonMember.show', compact('laundry_non_member'));
    }
}
