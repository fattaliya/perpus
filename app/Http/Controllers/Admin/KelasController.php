<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class KelasController extends Controller
{
    public function read(){
        $kelas = DB::table('kelas')->orderBy('id','DESC')->get();
        return view('admin.kelas.index',['kelas'=>$kelas]);
    }

    public function add(){
    	return view('admin.kelas.tambah');
    }

    public function create(Request $request){
        DB::table('kelas')->insert([
            'nama' => $request->nama,]);

        return redirect('/admin/kelas')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $kelas= DB::table('kelas')->where('id',$id)->first();
        return view('admin.kelas.edit',['kelas'=>$kelas]);
    }

    public function update(Request $request, $id) {
        DB::table('kelas')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama]);

        return redirect('/admin/kelas')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $kelas= DB::table('kelas')->where('id',$id)->first();
        DB::table('kelas')->where('id',$id)->delete();

        return redirect('/admin/kelas')->with("success","Data Berhasil Didelete !");
    }
}
