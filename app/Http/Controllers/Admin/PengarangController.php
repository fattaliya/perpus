<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PengarangController extends Controller
{
    public function read(){
        $pengarang = DB::table('pengarang')->orderBy('id','DESC')->get();
        return view('admin.pengarang.index',['pengarang'=>$pengarang]);
    }

    public function add(){
    	return view('admin.pengarang.tambah');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    	// mengambil data dari table pegawai sesuai pencarian data
		$pengarang = DB::table('pengarang')
		->where('nama','like',"%".$cari."%")
		->paginate();

    	// mengirim data pegawai ke view index
		return view('admin.pengarang.index',['pengarang' => $pengarang]);

	}

    public function create(Request $request){
        DB::table('pengarang')->insert([
            'nama' => $request->nama]);

        return redirect('/admin/pengarang')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $pengarang= DB::table('pengarang')->where('id',$id)->first();
        return view('admin.pengarang.edit',['pengarang'=>$pengarang]);
    }

    public function update(Request $request, $id) {
        DB::table('pengarang')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama]);

        return redirect('/admin/pengarang')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $pengarang= DB::table('pengarang')->where('id',$id)->first();
        DB::table('pengarang')->where('id',$id)->delete();

        return redirect('/admin/pengarang')->with("success","Data Berhasil Didelete !");
    }
}
