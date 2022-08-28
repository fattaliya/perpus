<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class KategoriController extends Controller
{
    public function read(){
        $kategori = DB::table('kategori')->orderBy('id','DESC')->get();
        return view('admin.kategori.index',['kategori'=>$kategori]);
    }

    public function add(){
    	return view('admin.kategori.tambah');
    }

    public function create(Request $request){
        $check = $request->all();
        if($request->kehilangan == "Buku"){
            $request->jumlah=1;
        }
        // dd($request->jumlah);die();

        DB::table('kategori')->insert([
            'nama' => $request->nama,
            'denda' => $request->denda,
            'satuan_denda' => $request->satuan_denda,
            'kehilangan' =>$request->kehilangan,
            'jumlah' =>$request->jumlah,
            'nominal' =>$request->nominal ]);

        return redirect('/admin/kategori')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){

        $kategori= DB::table('kategori')->where('id',$id)->first();
        return view('admin.kategori.edit',['kategori'=>$kategori]);
    }

    public function update(Request $request, $id) {
        DB::table('kategori')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'denda' => $request->denda,
                'satuan_denda' => $request->satuan_denda,
                'kehilangan' =>$request->kehilangan,
                'jumlah' =>$request->jumlah,
                'nominal' =>$request->nominal ]);

        return redirect('/admin/kategori')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $kelas= DB::table('kategori')->where('id',$id)->first();
        DB::table('kategori')->where('id',$id)->delete();

        return redirect('/admin/kategori')->with("success","Data Berhasil Didelete !");
    }
}
