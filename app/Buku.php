<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable =[
        'id','nib', 'terima_tanggal', 'judul', 'id_kategori', 'pengarang', 'penerbit','lokasi','exp',
        'cnb','asal_buku','tempat_terbit','stok','ketersedian','foto'
    ];
}
