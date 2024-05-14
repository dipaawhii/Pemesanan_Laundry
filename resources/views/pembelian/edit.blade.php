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
        <h2 class="d-flex justify-content-center">Edit Data</h2>
        <form action="{{route('pembelian.update',$pembelian->kode_barang)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
              <label for="email" class="form-label">ID Pembelian:</label>
              <input type="number" class="form-control" id="email" value="{{old('id_pembelian', $pembelian->id_pembelian)}}" name="id_pembelian" readonly>
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Kode Barang:</label>
              <input type="text" class="form-control" id="pwd" value="{{old('kode_barang', $pembelian->kode_barang)}}" name="kode_barang">
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">ID Pegawai:</label>
                <input type="password" class="form-control" id="pwd" value="{{old('id_pegawai', $pembelian->id_pegawai)}}" name="password" readonly>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Tanggal :</label>
                <input type="text" class="form-control" id="pwd" value="{{old('tanggal', $pembelian->tanggal)}}" name="tanggal">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Jumlah :</label>
                <input type="text" class="form-control" id="pwd" value="{{old('jumlah', $pembelian->jumlah)}}" name="jumlah">
            </div>
          
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          {{-- {{$pembelian->links()}} --}}
    </div>
</body>