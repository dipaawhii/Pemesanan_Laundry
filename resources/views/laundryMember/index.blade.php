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
        <div>
            <br>
            <h2 class="text-center">Data Laundry Member</h2>
            <div class="d-flex justify-content-end">
                <a href="{{route('laundryMember.create')}}" class="btn btn-outline-secondary">Tambah</a>
            </div>
            <div class="row">
                <div class="container mt-3">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th class="text-center">No Transaksi</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">ID Member</th>
                        <th class="text-center">ID Pegawai</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Status Laundry</th>
                        <th class="text-center">Status Pembayaran</th>
                        <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laundryMember as $index => $laundryMember)
                        <tr>
                            <td>{{$laundryMemeber->no_transaksi}}</td>
                            <td>{{$laundryMember->tgl_transaksi}}</td>
                            <td>{{$laundryMember->id_pegawai}}</td>
                            <td>{{$laundryMember->keterangan}}</td>
                            <td>{{$laundryMember->status_laundry}}</td>
                            <td>{{$laundryMember->status_pembayaran}}</td>
                            <td>{{$laundryMember->lokasi_kirim}}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="#" method="POST" class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-dark btn-sm" style="background-color: rgb(20, 20, 20);">SHOW</a>
                                    <a href="#" class="btn btn-primary btn-sm" style="background-color: rgb(3, 65, 197);">EDIT</a>
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
            {{-- {{$laundryMember->links()}} --}}
        </div>
</body>