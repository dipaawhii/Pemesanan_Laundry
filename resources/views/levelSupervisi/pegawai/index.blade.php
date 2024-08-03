@extends('dashboard.dashboardApp')
@section('content')
<div class="section-header">
    <h1>Pegawai</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pegawai as $index => $pegawai)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$pegawai->nama_pegawai}}</td>
                        <td>{{$pegawai->email}}</td>
                        <td>{{$pegawai->alamat}}</td>
                        <td>{{$pegawai->level}}</td>
                        <td>{{$pegawai->no_hp}}</td>
                        <td>
                            <a href="{{route('supervisi.pegawai.show', $pegawai->id_pegawai)}}" class="btn btn-dark btn-sm" style="background-color: rgb(20, 20, 20);"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data belum ada</strong>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
