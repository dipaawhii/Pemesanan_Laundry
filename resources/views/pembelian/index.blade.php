<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn {
        background-color: #005f02;
        border: solid 1px;
        color: white;
        padding: 10px 20px;
        text-align: center;
        font-size: 15px;
        margin: 4px 2px;
        opacity: 1;
        transition: 0.3s;
        }

        .btn:hover {opacity: 1}
    </style>
</head>
<body>
    <div class="container">
        <br>
        <h2 class="text-center">Data Pembelian</h2>
        <div class="d-flex justify-content-end">
            <a href="{{route('pembelian.create')}}" class="btn  btn-outline-secondary">Tambah</a>
        </div>
        <div class="row">
            <div class="container mt-3">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Kode Barang</th>
                    <th class="text-center">ID Pegawai</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelian as $index => $pembelian)
                    <tr>
                        <td>{{$pembelian->id_pembelian}}</td>
                        <td>{{$pembelian->kode_barang}}</td>
                        <td>{{$pembelian->id_pegawai}}</td>
                        <td>{{$pembelian->tanggal}}</td>
                        <td>{{$pembelian->jumlah}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('pembelian.destroy', $pembelian->kode_barang)}}" method="POST" class="d-flex justify-content-center">
                                <a href="{{route('pembelian.show', $pembelian->kode_barang)}}"class="btn btn-dark btn-sm" style="background-color: rgb(20, 20, 20);">SHOW</a>
                                <a href="{{route('pembelian.edit', $pembelian->kode_barang)}}" class="btn btn-primary btn-sm" style="background-color: rgb(3, 65, 197);">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="background-color: rgb(242, 3, 3);">HAPUS</button>
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
        {{-- {{$pembelian->links()}} --}}
    </div>
</body>