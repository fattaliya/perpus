<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categori = Categori::all();

        return view('index', compact('categori'));
    }


    public function cari(Request $request)
    {
        // menangkap data pencarian

        $cari = $request->cari;


        $kategori = DB::table('kategori')
            ->where('nama ', 'LIKE', '%' . $cari . '%')
            ->paginate(10);
        dd($kategori);
        die();

        return view('admin.kategori.index', ['kategori' => $kategori]);
    }

    public function searchQuery(Request $request)
    {
        // $data = User::select("name")
        //     ->where("name", "LIKE", "%{$request->get('query')}%")
        //     ->get();
        $query = DB::table('kategori')->select('nama')
            ->where("nama", "LIKE", "%{$request->get('query')}%")
            ->get();

        foreach ($query as $q) {
            $data[] = $q->nama;
        }

        return response()->json($data);
    }

    public function cari_buku($kategori)
    {
        $q = str_replace('-', ' ', $kategori);
        $buku = DB::table('buku')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->where("kategori.nama", "LIKE", "%{$q}%")
            ->get();

        return view('template.cari', compact('buku', 'q'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
