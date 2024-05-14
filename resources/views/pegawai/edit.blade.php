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
        <form action="{{route('pegawai.update',$pegawai->id_pegawai)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
              <label for="email" class="form-label">ID:</label>
              <input type="number" class="form-control" id="email" value="{{old('id_pegawai', $pegawai->id_pegawai)}}" name="id_pegawai" readonly>
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Nama:</label>
              <input type="text" class="form-control" id="pwd" value="{{old('nama_pegawai', $pegawai->nama_pegawai)}}" name="nama_pegawai">
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" value="{{old('password', $pegawai->password)}}" name="password">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="pwd" value="{{old('telepon', $pegawai->alamat)}}" name="alamat">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jabatan</label>
                <select class="form-control" name="jabatan" id="exampleFormControlSelect1">
                  <option value="karyawan">Karyawan</option>
                  <option value="supervisi">Supervisi</option>
                  <option value="administrator">Administrator</option>
                 </select>
                 @error('jabatan')
                 <div class="alert alert-danger mt-2">
                     {{ $message }}
                 </div>
                 @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          {{-- {{$pelanggan->links()}} --}}
    </div>
</body>