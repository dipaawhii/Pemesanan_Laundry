<?php

namespace App\Http\Controllers;

use App\Models\LaundryNonMember;
use App\Models\Pegawai;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NonMemberController extends Controller
{
    public function index(): View
    {
        $laundry_non_member = DB::table('datalaundrynonmember')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrynonmember.id_pegawai')
            ->select('pegawai.nama_pegawai', 'datalaundrynonmember.*')
            ->get();
        return view('levelAdmin.laundryNonMember.index', compact('laundry_non_member'));
    }

    public function create(): View
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.laundryNonMember.create', compact('pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'no_telp' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        LaundryNonMember::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'no_telp' => $request->no_telp,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.laundry_non_member.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function show(string $id): View
    {
        $laundry_non_member = DB::table('datalaundrynonmember')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'datalaundrynonmember.id_pegawai')
            ->select('pegawai.nama_pegawai', 'datalaundrynonmember.*')
            ->where('datalaundrynonmember.no_transaksi', $id)
            ->first();
        return view('levelAdmin.laundryNonMember.show', compact('laundry_non_member'));
    }
    public function edit(string $id): View
    {
        $laundry_non_member = LaundryNonMember::findOrFail($id);
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.laundryNonMember.edit', compact('laundry_non_member', 'pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'no_telp' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        $laundry_non_member = LaundryNonMember::findOrFail($id);
        $laundry_non_member->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'no_telp' => $request->no_telp,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.laundry_non_member.index')->with(['success' => 'Data Berhasil Diedit']);
    }
    public function destroy($id): RedirectResponse
    {
        $laundry_non_member = LaundryNonMember::findOrFail($id);
        $laundry_non_member->delete();
        return redirect()->route('admin.laundry_non_member.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
