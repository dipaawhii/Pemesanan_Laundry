<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}
        
        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical;
        }
        
        input[type=number] {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical;
        }

        input[type=date] {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical;
        }

        input[type=submit] {
          background-color: #04AA6D;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        </style>
</head>
<body>
    <div class="container">
        <h2 class="d-flex justify-content-center" style="margin-top : 20px;"> Data Laundry Member</h2>
        <form action="{{route('laundryMember.store')}}" method="POST">
        @csrf
          <label for="fname">No Transaksi</label>
          <input type="number" id="fname" name="no_transaksi" placeholder=" Masukkan Nomor Tranaksi">
      
          <label for="lname">Tanggal Transaksi</label>
          <input type="date" id="lname" name="tgl_transaksi" placeholder="Masukkan Tanggal Transaksi">

          <label for="lname">ID Member</label>
          <input type="number" id="lname" name="member_id" placeholder="Masukkan ID Member">

          <label for="lname">ID Pegawai</label>
          <input type="number" id="lname" name="id_pegawai" placeholder="Masukkan ID Pegawai ">

          <label for="lname">Keterangan</label>
          <input type="text" id="lname" name="keterangan" placeholder="Keterangan">
      
          <label for="country">Status Laundry</label>
          <select id="country" name="status_laundry">
            <option value="menunggu">Menunggu</option>
            <option value="diproses">Diporses</option>
            <option value="selesai">Selesai</option>
          </select>

          <label for="country">Status Pembayaran</label>
          <select id="country" name="status_pembayaran">
            <option value="bayar">Sudah Bayar</option>
            <option value="belum">Belum Bayar</option>
          </select>
          
          <label for="lname">Lokasi Kirim</label>
          <input type="text" id="lname" name="lokasi_kirim" placeholder="Lokasi Kirim">

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        {{-- {{$laundryMember->links()}} --}}
    </div>
</body>
