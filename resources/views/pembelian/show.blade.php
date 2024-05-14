<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br>
        <div class="card text-center" style="margin-top: 10px;">
            <div class="card-header">
                <h2>Detail</h2>
            </div>
            <div class="card-body">
            <h5 class="card-title">{{$pembelian->id_pembelian}}</h5>
            <p class="card-text">{{$pembelian->kode_barang}}</p>
            <p class="card-text">{{$pembelian->id_pegawai}}</p>
            <p class="card-text">{{$pembelian->tanggal}}</p>
            <p class="card-text">{{$pembelian->jumlah}}</p>
            <a href="{{route('pembelian.index', $pembelian->kode_barang)}}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</body>