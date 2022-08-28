
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
                                    <h2 class="card-title text-primary">Edit Data Pengembalian</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/pengembalian" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/pengembalian/update/{{$pengembalian->id}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Nama Peminjam</label>
                                    <select class="form-control" name="nama_siswa" required>
                                      <option value="{{$siswa->nama_siswa}}">{{$siswa->nama_siswa}}</option>
                                      @foreach($siswaAll as $data)
                                      <option value="{{$data->nama_siswa}}">{{$data->nama_siswa}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal</label>
                                    <input type="text" name="tanggal" class="form-control" place_holder="Masukan Tanggal pengembalian...." value="{{$pengembalian->tanggal}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Buku</label>
                                    <select class="form-control" name="id_buku" required>
                                      <option value="">-- Pilih buku --</option>
                                      @foreach($buku as $data)
                                      <option value="{{$data->id}}">{{$data->judul}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>NIS</label>
                                    <input type="text" name="nis" class="form-control" place_holder="Masukan NIS pengembalian...." value="{{$pengembalian->nis}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" place_holder="Masukan Keterangan...." value="{{$pengembalian->keterangan}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Denda</label>
                                    <input type="text" name="id_denda" class="form-control" place_holder="Masukan ID Denda...." value="{{$pengembalian->id_denda}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status Buku</label>
                                    <input type="text" name="status_buku" class="form-control" place_holder="Masukan Status Buku...." value="{{$pengembalian->status_buku}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Hari denda</label>
                                    <input type="text" name="hari" class="form-control" place_holder="Masukan Status Buku...." value="{{$pengembalian->status_buku}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jumlah Buku Dikembalikan</label>
                                    <input type="text" name="jumlah" class="form-control" place_holder="Masukan Status Buku...." value="{{$pengembalian->status_buku}}">
                                </div>
                               <br>
                                <button class="btn btn-success" type="submit">Update Data</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
