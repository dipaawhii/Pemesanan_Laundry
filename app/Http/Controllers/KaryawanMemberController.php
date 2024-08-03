<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class KaryawanMemberController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $laundry_member = DB::table('datalaundrymember')
            ->join('member', 'member.member_id', '=', 'datalaundrymember.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrymember.id_pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'datalaundrymember.*')
            ->where('users.id', $id)
            ->get();
        return view('levelKaryawan.laundryMember.index', compact('laundry_member'));
    }

    public function show(string $id): View
    {
        $laundry_member = DB::table('datalaundrymember')
            ->join('member', 'member.member_id', '=', 'datalaundrymember.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrymember.id_pegawai')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'datalaundrymember.*')
            ->where('datalaundrymember.no_transaksi', $id)
            ->first();
        return view('levelKaryawan.laundryMember.show', compact('laundry_member'));
    }
}
