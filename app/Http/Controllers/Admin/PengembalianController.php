<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;

class PengembalianController extends Controller
{


    public function read(){
        $pengembalian = DB::table('pengembalian')->orderBy('id','DESC')->get();
        $denda=6;
        $total=1000;
        return view('admin.pengembalian.index',['pengembalian'=>$pengembalian,'total'=>$total]);
    }

    public function add(){
        $buku = DB::table('buku')->orderBy('id','DESC')->get();
        $siswa = DB::table('data_siswa')->orderBy('nama_siswa','ASC')->get();
        return view('admin.pengembalian.tambah',['buku'=>$buku,'siswa'=>$siswa]);

    }

    public function create(Request $request){
        $peminjaman = DB::table('peminjaman')->where('nis',$request->nis)->where('id_buku',$request->id_buku)->first();

        if($peminjaman == ""){
            return redirect('/admin/pengembalian')->with("error","Anda Belum Pernah Meminjam Buku Ini !");
        }

        $tgl_pinjam = $peminjaman->tanggal;
        $tgl_kembali = $request->tanggal;

        if($tgl_kembali > $tgl_pinjam) {
            $tgl1 = new DateTime($tgl_pinjam);
            $tgl2 = new DateTime($tgl_kembali);
            $terlambat = $tgl2->diff($tgl1)->days;

            if($terlambat == 1){
                $denda = DB::table('denda')->find('1');
                $status = "Terlambat ".$terlambat." Hari Dikembalikan";
            } else if($terlambat == 2){
                $denda = DB::table('denda')->find('2');
                $status = "Terlambat ".$terlambat." Hari Dikembalikan";
            } else if($terlambat == 3){
                $denda = DB::table('denda')->find('3');
                $status = "Terlambat ".$terlambat." Hari Dikembalikan";
            } else if($terlambat > 3){
                $denda = DB::table('denda')->find('4');
                $status = "Terlambat ".$terlambat." Hari Dikembalikan";
            }

            DB::table('pengembalian')->insert([
                // 'nama_siswa' => $request->nama_siswa,
                'tanggal' => $request->tanggal,
                'id_buku' => $request->id_buku,
                'nis' => $request->nis,
                // 'id_denda' => $denda->id,
                'status_buku' => $status,
                'jumlah' => $request->jumlah,
                'keterangan' => 'keterangan'
            ]);
        } else {
            $status = "Sudah Dikembalikan";
            DB::table('pengembalian')->insert([
                'nama_siswa' => $request->nama_siswa,
                'tanggal' => $request->tanggal,
                'id_buku' => $request->id_buku,
                'nis' => $request->nis,
                'keterangan' => $request->keterangan,
                'jumlah' => $request->jumlah,
                'status_buku' => $status
            ]);

            $sisa_stok = Buku::where('id',$data->id_buku)->get();
            foreach ($sisa_stok as $sisa) {
                $rest = Buku::find($sisa->id);
                $rest->where('id', $data->id_buku)
                ->update([
                    'stok' => ($rest->stok - $data->jumlah),
                ]);

                $rest->save();
        }

        return redirect('/admin/pengembalian')->with("success","Data Buku Sudah Dikembalikan !");
    }
}

    public function edit($id){
        $pengembalian= DB::table('pengembalian')->where('id',$id)->first();

        $buku = DB::table('buku')->find($pengembalian->id_buku);
        $bukuAll = DB::table('buku')->where('id','!=',$buku->id)->orderBy('id','DESC')->get();

        $denda = DB::table('denda')->find($pengembalian->id_denda);
        $dendaAll = DB::table('denda')->where('id','!=',$denda->id)->orderBy('id','DESC')->get();

        $siswa = DB::table('data_siswa')->where('nis',$pengembalian->nis)->first();
        $siswaAll = DB::table('data_siswa')->where('nis','!=',$pengembalian->nama_siswa)->orderBy('nama_siswa','ASC')->get();


        return view('admin.pengembalian.edit',['pengembalian'=>$pengembalian,
        'buku'=>$buku,'denda'=>$denda,'bukuAll'=>$bukuAll,'dendaAll'=>$dendaAll,'siswa'=>$siswa,'siswaAll'=>$siswaAll]);
    }

    public function update(Request $request, $id) {
        DB::table('pengembalian')
            ->where('id', $id)
            ->update([
            'nama_siswa' => $request->nama_siswa,
            'tanggal' => $request->tanggal,
            'id_buku' => $request->id_buku,
            'nis' => $request->nis,
            'keterangan' => $request->keterangan,
            'id_denda' => $request->id_denda,
            'status_buku' => $request->status_buku,
            'jumlah' => $request->jumlah,
            'hari_denda'=>$request->hari
        ]);

        return redirect('/admin/pengembalian')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $pengembalian= DB::table('pengembalian')->where('id',$id)->first();
        DB::table('pengembalian')->where('id',$id)->delete();

        return redirect('/admin/pengembalian')->with("success","Data Berhasil Didelete !");
    }
}
