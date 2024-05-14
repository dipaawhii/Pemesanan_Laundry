<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(): View {
        $pegawai = pegawai::latest()->paginate(10);
        return view('pegawai.index', compact('pegawai'));
    }

    public function create(): View{
        return view('pegawai.create');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'id_pegawai' => 'required|unique:pegawai,id_pegawai',
            'nama_pegawai' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
        ]);

        pegawai::create([
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
        ]);
        return redirect()->route('pegawai.index')->with(['success'=>'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View{
        $pegawai = pegawai::findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(string $id): View{
        $pegawai = pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }
    
    public function update(Request $request, $id) : RedirectResponse{
        $request->validate([
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
        ]);

        $pegawai = pegawai::findOrFail($id);
        $pegawai -> update([
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'password'=> $request->password,
            'alamat'=> $request->alamat,
            'jabatan'=> $request->jabatan,
        ]);
        return redirect()-> route('pegawai.index')-> with(['success'=>'Data Berhasil Diedit']);
    }

    public function destroy($id) : RedirectResponse{
        $pegawai = pegawai::findOrFail($id);
        $pegawai -> delete();
        return redirect()-> route('pegawai.index')-> with(['success'=> 'Data Berhasil Dihapus']);
    }
}
