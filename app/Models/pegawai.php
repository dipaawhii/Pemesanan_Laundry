<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = [
        'user_id',
        'id_pegawai',
        'nama_pegawai',
        'alamat',
        'no_hp',
    ];

    protected $primaryKey = 'id_pegawai';
}
