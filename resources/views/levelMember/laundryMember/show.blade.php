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
            <h5 class="section-title">{{$laundry_member->no_transaksi}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Tgl Transaksi</strong> : {{$laundry_member->tgl_transaksi}}</p>
            <p class="card-text"><strong>Nama Member</strong> : {{$laundry_member->nama_member}}</p>
            <p class="card-text"><strong>Nama Pegawai</strong> : {{$laundry_member->nama_pegawai}}</p>
            <p class="card-text"><strong>Keterangan</strong> : {{$laundry_member->keterangan}}</p>
            <p class="card-text"><strong>Status Laundry</strong> : {{$laundry_member->status_laundry}}</p>
            <p class="card-text"><strong>Status Pembayaran</strong> : {{$laundry_member->status_pembayaran}}</p>
            <p class="card-text"><strong>Lokasi Kirim</strong> : {{$laundry_member->lokasi_kirim}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="{{route('member.laundry_member.index')}}" class="btn btn-primary"><i class="fas fa-caret-left"></i></a>
        </div>
    </div>
</div>
</div>
@endsection