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
    <div class="card-header">
      <h2 class="section-title">Tambah Data</h2>
    </div>
    <div class="card-body">
      <form action="{{route('admin.laundry_non_member.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="pwd" class="form-label">Tgl Transaksi</label>
          <input type="date" class="form-control" id="pwd" placeholder="Masukkan Tanggal" name="tgl_transaksi">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Nama Customer</label>
          <input type="text" class="form-control" id="pwd" placeholder="Masukkan Nama" name="nama_customer">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Alamat</label>
          <textarea class="form-control" id="pwd" placeholder="Masukkan Alamat" name="alamat_customer"></textarea>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Telepon</label>
          <input type="text" class="form-control" id="pwd" placeholder="Masukkan No. Telepon" name="no_telp">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Nama Pegawai</label>
          <select class="form-control" name="id_pegawai" id="exampleFormControlSelect1">
            @foreach ($pegawai as $pegawai)
            <option value="{{ $pegawai->id_pegawai }}">{{ $pegawai->nama_pegawai }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Keterangan</label>
          <textarea class="form-control" id="pwd" placeholder="Keterangan" name="keterangan"></textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Status Laundry</label>
          <select class="form-control" name="status_laundry" id="exampleFormControlSelect1">
            <option value="Menunggu">Menunggu</option>
            <option value="Diproses">Diproses</option>
            <option value="Selesai">Selesai</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Status Pembayaran</label>
          <select class="form-control" name="status_pembayaran" id="exampleFormControlSelect1">
            <option value="Bayar">Bayar</option>
            <option value="Belum">Belum</option>
          </select>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Lokasi Kirim</label>
          <textarea class="form-control" id="pwd" placeholder="Masukkan Lokasi" name="lokasi_kirim"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection