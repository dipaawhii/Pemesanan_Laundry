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

        body {
        margin: 0;
        font-family: "Lato", sans-serif;
        }

        .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
        }

        .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
        }
        
        .sidebar a.active {
        background-color: #04AA6D;
        color: white;
        }

        .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
        }

        div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
        }

        @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>
<body>
    <!-- The sidebar -->
    <div class="sidebar">
        <a class="active" href="{{route('pegawai.index')}}">Pegawai</a>
        <a href="{{route('laundryMember.index')}}">Data Member</a>
        <a href="#contact">Data NonMember</a>
        <a href="{{route('pembelian.index')}}">Pembelian</a>
    </div>
    <div class="content">
        <div>
            <br>
            <h2 class="text-center">Data Pegawai</h2>
            <div class="d-flex justify-content-end">
                <a href="{{route('pegawai.create')}}" class="btn  btn-outline-secondary">Tambah</a>
            </div>
            <div class="row">
                <div class="container mt-3">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $index => $pegawai)
                        <tr>
                            <td>{{$pegawai->id_pegawai}}</td>
                            <td>{{$pegawai->nama_pegawai}}</td>
                            <td>{{$pegawai->password}}</td>
                            <td>{{$pegawai->alamat}}</td>
                            <td>{{$pegawai->jabatan}}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('pegawai.destroy', $pegawai->id_pegawai)}}" method="POST" class="d-flex justify-content-center">
                                    <a href="{{route('pegawai.show', $pegawai->id_pegawai)}}" class="btn btn-dark btn-sm" style="background-color: rgb(20, 20, 20);">SHOW</a>
                                    <a href="{{route('pegawai.edit', $pegawai->id_pegawai)}}" class="btn btn-primary btn-sm" style="background-color: rgb(3, 65, 197);">EDIT</a>
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
            {{-- {{$pegawai->links()}} --}}
        </div>
    </div>
</body>