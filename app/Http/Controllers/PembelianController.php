<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index(): View {
        $pembelian = Pembelian::latest()->paginate(10);
        return view('pembelian.index', compact('pembelian'));
    }

    public function create(): View{
        return view('pembelian.create');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'id_pembelian' => 'required|unique:pembelian,id_pembelian',
            'kode_barang' => 'required',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        Pembelian::create([
            'id_pembelian' => $request->id_pembelian,
            'kode_barang' => $request->kode_barang,
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('pembelian.index')->with(['success'=>'Data Berhasil Ditambahkan']);
    }
    public function show(string $id): View{
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }
    public function edit(string $id): View{
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.edit', compact('pembelian'));
    }
    
    public function update(Request $request, $id) : RedirectResponse{
        $request->validate([
            'id_pembelian' => 'required|unique:pembelian,id_pembelian',
            'kode_barang' => 'required',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian -> update([
            'id_pembelian' => $request->id_pembelian,
            'kode_barang' => $request->kode_barang,
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()-> route('pembelian.index')-> with(['success'=>'Data Berhasil Diedit']);
    }
    public function destroy($id) : RedirectResponse{
        $pembelian = Pembelian::findOrFail($id);
        $pembelian -> delete();
        return redirect()-> route('pembelian.index')-> with(['success'=> 'Data Berhasil Dihapus']);
    }
}
