<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class rakController extends Controller
{
    public function read(){
        $rak = DB::table('rak')->orderBy('id','DESC')->get();
        return view('admin.rak.index',['rak'=>$rak]);
    }

    public function add(){
    	return view('admin.rak.tambah');
    }

    public function create(Request $request){
        DB::table('rak')->insert([
            // 'nama' => $request->nama,
            'nomor' => $request->nomor]);

        return redirect('/admin/rak')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $rak= DB::table('rak')->where('id',$id)->first();
        return view('admin.rak.edit',['rak'=>$rak]);
    }

    public function update(Request $request, $id) {
        DB::table('rak')
            ->where('id', $id)
            ->update([
                // 'nama' => $request->nama,
                'nomor' => $request->nomor]);

        return redirect('/admin/rak')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $rak= DB::table('rak')->where('id',$id)->first();
        DB::table('rak')->where('id',$id)->delete();

        return redirect('/admin/rak')->with("success","Data Berhasil Didelete !");
    }
}
