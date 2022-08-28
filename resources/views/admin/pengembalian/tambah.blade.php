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
                                    <h2 class="card-title text-primary">Tambah Data Pengembalian</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/pengembalian" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/pengembalian/create" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" place_holder="Masukan Tanggal pengembalian...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Buku</label>
                                    <select class="form-control" name="id_buku" required>
                                      <option value="">-- Pilih Buku --</option>
                                      @foreach($buku as $data)
                                      <option value="{{$data->id}}">{{$data->judul}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Nama Peminjam</label>
                                    <select class="form-control" name="nama_siswa" required>
                                    <option value="">-- Pilih Siswa --</option>
                                     @foreach(\DB::table('data_siswa')->get() as $data)
                                      <option value="{{$data->nama_siswa}}">{{$data->nama_siswa}}</option>
                                      @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group mb-3">
                                    <label>Jumlah Buku Dikembalikan</label>
                                    <input type="text" name="jumlah" class="form-control" place_holder="Masukan n...." value="">
                                </div>
                               <br>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
