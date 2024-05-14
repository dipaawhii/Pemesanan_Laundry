<?php

namespace App\Http\Controllers;

use App\Models\laundryMember;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class laundryMemberController extends Controller
{
    public function index(): View {
        $laundryMember = laundryMember::latest()->paginate(10);
        return view('laundryMember.index', compact('laundryMember'));
    }

    public function create(): View{
        return view('laundryMember.create');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'no_transaksi' => 'required|unique:datalaundrymember,no_transaksi',
            'tgl_transaksi' => 'required',
            'member_id' => 'required|exists:member,member_id',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        laundryMember::create([
            'no_transaksi' => $request->no_transaksi ,
            'tgl_transaksi' => $request->tgl_transaksi,
            'member_id' => $request->member_id,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('laundryMember.inex')->with(['success'=>'Data Berhasil Ditambahkan']);
    }
}
