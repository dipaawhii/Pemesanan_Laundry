@extends('dashboard.dashboardApp')
@section('content')
<div class="section-header">
    <h1>Non Member</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class>No.</th>
                            <th class>Tgl Transaksi</th>
                            <th class>Nama Customer</th>
                            <th class>Nama Pegawai</th>
                            <th class>Status Laundry</th>
                            <th class>Status Pembayaran</th>
                            <th class>Lokasi Kirim</th>
                            <th class>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laundry_non_member as $index => $laundry_non_member)
                        <tr>
                            <td class="text-center">
                                {{ ++$index }}
                            </td>
                            <td>{{$laundry_non_member->tgl_transaksi}}</td>
                            <td>{{$laundry_non_member->nama_customer}}</td>
                            <td>{{$laundry_non_member->nama_pegawai}}</td>
                            <td>{{$laundry_non_member->status_laundry}}</td>
                            <td>{{$laundry_non_member->status_pembayaran}}</td>
                            <td>{{$laundry_non_member->lokasi_kirim}}</td>
                            <td>
                                <a href="{{route('karyawan.laundry_non_member.show', $laundry_non_member->no_transaksi)}}" class="btn btn-dark btn" style="background-color: rgb(20, 20, 20);"><i class="fas fa-eye"></i></a>
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