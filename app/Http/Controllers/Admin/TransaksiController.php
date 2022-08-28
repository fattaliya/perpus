<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Buku;
use App\Data_siswa;
use App\Transaksi;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        $transaksi = DB::table('transaksi')->orderBy('id','DESC')->paginate(5);
        return view ('admin.transaksi.index' ,['transaksi'=>$transaksi]);



        // if(Auth::user()->level == 'user')
        {
            $datas = Transaksi::where('data_siswa_id', Auth::user()->data_siswa->id)
                                ->get();
        // } else {
            $datas = Transaksi::get();
        }
        return view('admin.transaksi.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $getRow = Transaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();

        $lastId = $getRow->first();

        $kode = "TR00001";

        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "TR0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "TR000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "TR00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "TR0".''.($lastId->id + 1);
            } else {
                    $kode = "TR".''.($lastId->id + 1);
            }
        }

        $buku = Buku::where('stok', '>', 0)->get();
        $data_siswa = Data_siswa::get();
        return view('admin.transaksi.create', compact('buku', 'kode', 'data_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_transaksi' => 'required|string|max:255',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'buku_id' => 'required',
            'data_siswa_id' => 'required',

        ]);

        $transaksi = Transaksi::create([
                'kode_transaksi' => $request->get('kode_transaksi'),
                'tgl_pinjam' => $request->get('tgl_pinjam'),
                'tgl_kembali' => $request->get('tgl_kembali'),
                'buku_id' => $request->get('buku_id'),
                'data_siswa_id' => $request->get('data_siswa_id'),
                'ket' => $request->get('ket'),
                'status' => 'pinjam'
            ]);

        $transaksi->buku->where('id', $transaksi->buku_id)
                        ->update([
                            'stok' => ($transaksi->buku->stok - 1),
                            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('admin.transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Transaksi::findOrFail($id);


        if((Auth::user()->level == 'user') && (Auth::user()->data_siswa->id != $data->data_siswa_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }


        return view('transaksi.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaksi::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->data_siswa->id != $data->data_siswa_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        return view('admin.buku.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->update([
                'status' => 'kembali'
                ]);

        $transaksi->buku->where('id', $transaksi->buku->id)
                        ->update([
                            'stok' => ($transaksi->buku->stok + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('admin.transaksi');
        // return redirect('/admin/peminjaman')->with("success","Data Berhasil Diupdate !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('admin.transaksi.index');
    }
}

