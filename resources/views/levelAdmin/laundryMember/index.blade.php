@extends('dashboard.dashboardApp')
@section('content')
<div class="section-header">
    <h1>Member Laundry</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.laundry_member.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class>No.</th>
                            <th class>Tgl Transaksi</th>
                            <th class>Nama Member</th>
                            <th class>Nama Pegawai</th>
                            <th class>Status Laundry</th>
                            <th class>Status Pembayaran</th>
                            <th class>Lokasi Kirim</th>
                            <th class>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laundry_member as $index => $laundry_member)
                        <tr>
                            <td class="text-center">
                                {{ ++$index }}
                            </td>
                            <td>{{$laundry_member->tgl_transaksi}}</td>
                            <td>{{$laundry_member->nama_member}}</td>
                            <td>{{$laundry_member->nama_pegawai}}</td>
                            <td>{{$laundry_member->status_laundry}}</td>
                            <td>{{$laundry_member->status_pembayaran}}</td>
                            <td>{{$laundry_member->lokasi_kirim}}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.laundry_member.destroy', $laundry_member->no_transaksi)}}" method="POST" class="d-flex justify-content-center">
                                    <a href="{{route('admin.laundry_member.show', $laundry_member->no_transaksi)}}" class="btn btn-dark btn" style="background-color: rgb(20, 20, 20);"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('admin.laundry_member.edit', $laundry_member->no_transaksi)}}" class="btn btn-primary btn" style="background-color: rgb(3, 65, 197);"><i class="fas fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn" style="background-color: rgb(242, 3, 3);"><i class="fas fa-trash"></i></button>
                                </form>
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