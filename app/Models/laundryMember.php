<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laundryMember extends Model
{
    use HasFactory;

    protected $table = 'datalaundrymember';
    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        'member_id',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
        'lokasi_kirim',
    ];

    protected $primaryKey = 'no_transaksi';
    
}
