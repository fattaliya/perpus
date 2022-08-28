@extends('admin.layouts.app', [
    'activePage' => 'master',
  ])
@section('content')
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-11">
                                    {{-- <h2 class="card-title text-primary">List Data Buku</h2> --}}
                                     <a href="/admin/buku/print_buku" class="btn btn-md btn-block btn-success"><i class="fa fa-print"></i> Print</a>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/buku/add" class="btn btn-md btn-block btn-primary"><i class="bx bx-plus"></i></a>
                                </div>
                                <div class="col card-header text-right">
                                    <form action="/admin/buku/cari" method="GET">
                                        <input  type="text" name="cari" placeholder="Cari Buku .." value="{{ old('cari') }}">
                                        <input type="submit" value="CARI">
                                    </form>
                                </div>
                            </div>
                          <hr>
<div class="row" style="margin-top: 20px;">
     <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Data Buku</h4>
                <div class="table-responsive">
                  <table class="table table-striped" id="table">
                    <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIB</th>
                                    <th>Tanggal Terima</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Lokasi</th>
                                    <th>Tempat Terbit</th>
                                    <th>EXP</th>
                                    <th>CBN</th>
                                    <th>Asal Buku</th>
                                    <th>Stok</th>
                                    <th>Ketersedian</th>
                                    <th>Foto</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                <?php $no = 1; ?>
                                @foreach($buku as $data)
                                <?php

                                  $kategori = DB::table('kategori')->find($data->id_kategori);

                                ?>
                                <?php $sisa=0;?>

                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nib}}</td>
                                    <td>{{$data->terima_tanggal}}</td>
                                    <td>{{$data->judul}}</td>
                                    <td>{{$kategori->nama}}</td>
                                    <td>{{$data->pengarang}}</td>
                                    <td>{{$data->penerbit}}</td>
                                    <td>{{$data->lokasi}}</td>
                                    <td>{{$data->tempat_terbit}}</td>
                                    <td>{{$data->exp}}</td>
                                    <td>{{$data->cnb}}</td>
                                    <td>{{$data->asal_buku}}</td>
                                    <td>{{$data->stok}}</td>
                                    <td>{{$data->ketersedian}}</td>
                                    <td>
                                    <img src="/foto/{{$data->foto}}" alt="{{$data->foto}}" width="200"/>
                                    </td>

                                    <td class="text-center">
                                        {{-- @if(auth()->user()->level == 'admin') --}}
                                        <a href="/admin/buku/edit/{{$data->id}}" class="btn btn-sm btn-success"><i class="bx bx-pencil"></i></a>
                                        {{-- @endif --}}
                                        {{-- <a href="/admin/buku/detail/{{$data->nib}}" class="btn btn-sm btn-primary"><i class="bx bx-show"></i></a> --}}
<br><br>
                                      <form action="/admin/buku/delete/{{$data->id}}" method="get" class="-inline" onsubmit="return confirm('Yakin anda mau menghapus')">
                                      <form method="POST"><form method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                        <i class="bx bx-trash"></i>
                                        </button>
                                      </form>
                                      </td>
                                </tr>
                                @endforeach
                            </table>
                          </div>
                        </div>
                          </div></div></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{$buku->links()}}
@endsection
