<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $peminjaman= DB::table('peminjaman')->count();
        $pengembalian= DB::table('pengembalian')->count();
        $buku= DB::table('buku')->count();
        $data_siswa= DB::table('data_siswa')->count();

        return view('admin.dashboard.index',['peminjaman'=>$peminjaman,'pengembalian'=>$pengembalian,'buku'=>$buku,'data_siswa'=>$data_siswa]);
    }

}
