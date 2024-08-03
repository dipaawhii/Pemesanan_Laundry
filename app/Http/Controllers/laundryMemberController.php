<?php

namespace App\Http\Controllers;

use App\Models\LaundryMember;
use App\Models\Member;
use App\Models\Pegawai;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaundryMemberController extends Controller
{
    public function index(): View
    {
        $laundry_member = DB::table('datalaundrymember')
            ->join('member', 'member.member_id', '=', 'datalaundrymember.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrymember.id_pegawai')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'datalaundrymember.*')
            ->get();
        return view('levelAdmin.laundryMember.index', compact('laundry_member'));
    }

    public function create(): View
    {
        $member = Member::all();
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.laundryMember.create', compact('member', 'pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'member_id' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        LaundryMember::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'member_id' => $request->member_id,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.laundry_member.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function show(string $id): View
    {
        $laundry_member = DB::table('datalaundrymember')
            ->join('member', 'member.member_id', '=', 'datalaundrymember.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrymember.id_pegawai')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'datalaundrymember.*')
            ->where('datalaundrymember.no_transaksi', $id)
            ->first();
        return view('levelAdmin.laundryMember.show', compact('laundry_member'));
    }
    public function edit(string $id): View
    {
        $laundry_member = LaundryMember::findOrFail($id);
        $member = Member::all();
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.laundryMember.edit', compact('laundry_member', 'member', 'pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'member_id' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        $laundry_member = LaundryMember::findOrFail($id);
        $laundry_member->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'member_id' => $request->member_id,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.laundry_member.index')->with(['success' => 'Data Berhasil Diedit']);
    }
    public function destroy($id): RedirectResponse
    {
        $laundry_member = LaundryMember::findOrFail($id);
        $laundry_member->delete();
        return redirect()->route('admin.laundry_member.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
