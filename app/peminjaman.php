<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable =[
        'id', 'id_siswa', 'tanggal_pinjam', 'tanggal_kembali', 'tanggal_pengembalian', 'id_buku','id_denda','status_buku','status_peminjaman'
    ];

}
