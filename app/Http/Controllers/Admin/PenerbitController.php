<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PenerbitController extends Controller
{
    public function read(){
        $penerbit = DB::table('penerbit')->orderBy('id','DESC')->get();
        return view('admin.penerbit.index',['penerbit'=>$penerbit]);
    }

    public function add(){
    	return view('admin.penerbit.tambah');
    }

    public function create(Request $request){
        DB::table('penerbit')->insert([
            'nama' => $request->nama,
            // 'tahun' => $request->tahun,
            'lokasi' => $request->lokasi]);

        return redirect('/admin/penerbit')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $penerbit= DB::table('penerbit')->where('id',$id)->first();
        return view('admin.penerbit.edit',['penerbit'=>$penerbit]);
    }

    public function update(Request $request, $id) {
        DB::table('penerbit')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                // 'tahun' => $request->tahun,
                'lokasi' => $request->lokasi]);

        return redirect('/admin/penerbit')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $penerbit= DB::table('penerbit')->where('id',$id)->first();
        DB::table('penerbit')->where('id',$id)->delete();

        return redirect('/admin/penerbit')->with("success","Data Berhasil Didelete !");
    }
}
