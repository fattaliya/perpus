<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use File;


class BukuController extends Controller
{
    public function read(Request $request){

        if($request->has('search')){

            // $buku = Buku::where('judul','like','%'.$request->search.'%');

            $buku = DB::table('buku')
		    ->whereRaw('LOWER(`judul`) LIKE ? ', strtolower($request->search))->get();

        }else{
            $buku = DB::table('buku')->orderBy('id','DESC')->get();
        }

        $buku = DB::table('buku')->orderBy('id','DESC')->paginate(5);
        return view('admin.buku.index',['buku'=>$buku]);
    }

    public function add(){
        $pengarang = DB::table('pengarang')->orderBy('id','DESC')->get();
        $penerbit = DB::table('penerbit')->orderBy('id','DESC')->get();
        $rak = DB::table('rak')->orderBy('nomor','DESC')->get();
        $kategori=DB::table('kategori')->get();

    	return view('admin.buku.tambah',['pengarang'=>$pengarang,'penerbit'=>$penerbit,'rak'=>$rak,'kategori'=>$kategori]);
    }


    public function print_buku()
    {
        $buku = DB::table('buku')->orderBy('id','DESC')->get();
        return view('admin/buku/print_buku', compact('buku'));
    }

    public function print()
    {
        $buku = DB::table('buku')->orderBy('id','DESC')->get();
        return view('admin/buku/print', compact('buku'));
    }

    public function cetak(){
        $buku = DB::table('buku')->get();
        return view('admin.buku.cetak',['buku'=>$buku]);
    }


    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$buku = DB::table('buku')
		->where('judul','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('admin.buku.index',['buku' => $buku]);

	}


	 public function create(Request $request){

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
                $name = time() . '.' . $foto->extension();
                $foto->move(public_path().'/foto/', $name);
        }else{
            $name = 'tidak ada file.png';
        }
        DB::table('buku')->insert([
            'nib' => $request->nib,
            'terima_tanggal' => $request->terima_tanggal,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tempat_terbit' => $request->tempat_terbit,
            'exp' => $request->exp,
            'lokasi' => $request->lokasi,
            'asal_buku' =>$request->asal_buku,
            'stok' => $request->stok,
            'cnb' => $request->cnb,
            'ketersedian' =>$request->stok,
            'id_kategori'=>$request->id_kategori,
            'foto' => $name
        ]);

        return redirect('/admin/buku')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $buku= DB::table('buku')->where('id',$id)->first();

        // $pengarang = DB::table('pengarang')->find($buku->id_pengarang);
        // $pengarangAll = DB::table('pengarang')->where('id','!=',$pengarang->id)->orderBy('id','DESC')->get();

        $kategori = DB::table('kategori')->find($buku->id_kategori);
        $kategoriAll = DB::table('kategori')->where('id','!=',$kategori->id)->orderBy('id','DESC')->get();

        // $rak = DB::table('rak')->find($buku->id_rak);
        // $rakAll = DB::table('rak')->where('id','!=',$rak->id)->orderBy('id','DESC')->get();
        return view('admin.buku.edit',['buku'=>$buku,'kategori'=>$kategori,
                                        'kategoriAll'=>$kategoriAll]);
    }

    public function update(Request $request, $id) {

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
                $name = time() . '.' . $foto->extension();
                $foto->move(public_path().'/foto/', $name);
        }else{
            $name = 'tidak ada file.png';
        }
        DB::table('buku')
        ->where('id', $id)
        ->update([
            'nib' => $request->nib,
            'terima_tanggal' => $request->terima_tanggal,
            'judul' => $request->judul,
            'id_kategori'=>$request->id_kategori,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'lokasi' => $request->lokasi,
            'tempat_terbit' => $request->tempat_terbit,
            'exp' => $request->exp,
            'cnb' => $request->cnb,
            'ketersedian' =>$request->ketersedian,
            'asal_buku' =>$request->asal_buku,
            'stok' =>$request->stok,
            'foto' => $name
        ]);

        return redirect('/admin/buku')->with("success","Data Berhasil Update !");
    }


    public function delete($id)
    {
        $buku= DB::table('buku')->where('id',$id)->first();
        DB::table('buku')->where('id',$id)->delete();

        return redirect('/admin/buku')->with("success","Data Berhasil Didelete !");


    }
}
