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
        <h2 class="d-flex justify-content-center" style="margin-top : 20px;">Tambah Data Pembelian</h2>
        <div>
            <form action="{{route('pembelian.store')}}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="email" class="form-label">ID Pembelian :</label>
                  <input type="number" class="form-control" id="email" placeholder="ID Pembelian" name="id_pembelian">
                </div>
                <div class="mb-3">
                  <label for="pwd" class="form-label">Kode Barang :</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Masukkan Kode Barang" name="kode_barang">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">ID Pegawai :</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Masukkan ID Pegawai" name="id_pegawai">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Tanggal :</label>
                    <input type="date" class="form-control" id="pwd" placeholder="Masukkan Tanggal" name="tanggal">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Jumlah Pembelian :</label>
                    <input type="number" class="form-control" id="pwd" placeholder="Masukkan Jumlah" name="jumlah">
                  </div>
                     @error('id_pegawai')
                     <div class="alert alert-danger mt-2">
                         {{ $message }}
                     </div>
                     @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            {{-- {{$pembelian->links()}} --}}
        </div>
    </div>
</body>
