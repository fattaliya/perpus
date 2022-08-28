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
                                    <h2 class="card-title text-primary">Edit Data peminjaman</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/peminjaman" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/peminjaman/denda" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="id" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$peminjaman->id}}" hidden>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="id_buku" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$peminjaman->id_buku}}" hidden>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Judul Buku</label>
                                    <input type="text" name="buku" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$buku->judul}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$peminjaman->tanggal_pinjam}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Jatuh Tempo</label>
                                    <input type="date" name="tanggal_kembali" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$peminjaman->tanggal_kembali}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Pengembalian</label>
                                    <input type="date" name="tanggal_pengembalian" class="form-control" value="{{$tgl}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Telat</label>
                                    <input type="text" name="telat" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$days}} Hari">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Denda</label>
                                    <input type="text" name="total_denda" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$days*$denda->nominal}}">
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
