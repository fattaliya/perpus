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
                                    <h2 class="card-title text-primary"> Pengembalian</h2>
                                    <a href="/admin/peminjaman/print_peminjaman" class="btn btn-md btn-block btn-success"><i class="fa fa-print"></i> Print</a>
                                </div>
                                <div class="col-md-1">

                                    <a href="/admin/pengembalian/add" class="btn btn-md btn-block btn-danger"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                          <hr>
                          @if(session('success'))
                          <div class="alert alert-primary" role="alert">
                            {{ session('success')}}
                          </div>
                          @endif
                          @if(session('error'))
                          <div class="alert alert-danger" role="alert">
                            {{ session('error')}}
                          </div>
                          @endif
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">
                <h3 class="card-title">List Data Pengembalian</h4>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam </th>
                                    <th>BUKU</th>
                                    <th>Tanggal Pinjam </th>
                                    <th>Tanggal Pinjam </th>
                                    <th>Tanggal Pengembalian </th>
                                    <th>Denda</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                <?php $no = 1; ?>
                                @foreach($pengembalian as $data)
                                <?php
                                  $buku = DB::table('buku')->find($data->id_buku);
                                  $denda = DB::table('denda')->find($data->id_denda);
                                ?>


                                <?php $total_denda=0;?>

                                <tr>


                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_siswa}}</td>
                                    <td>{{$data->tanggal_pinjam}}</td>
                                    <td>{{$data->tanggal_kembali}}</td>
                                    <td>{{$data->tanggal_pengembalian}}</td>

                                    {{-- <td>
                                      {{$data->hari_denda}}
                                    </td> --}}
                                    {{-- <td>
                                        {{($data->hari_denda*$total)}}
                                      </td>
                                      <td>{{$data->jumlah}}</td>
                                    <td>Telat - {{$data->hari_denda}} Hari</td> --}}
                                    
                                    <td class="text-center">
                                    <form action="/admin/pengembalian/delete/{{$data->id}}" method="get" class="-inline" onsubmit="return confirm('Yakin anda mau menghapus')">
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
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

                </div>
              </div>
            </div>
@endsection
