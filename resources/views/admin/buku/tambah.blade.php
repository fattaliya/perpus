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
                                    <h2 class="card-title text-primary">Tambah Data Buku</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/buku" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/buku/create" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>NIB</label>
                                    <input type="text" name="nib" class="form-control" place_holder="Masukan Kode buku..." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Terima Tanggal</label>
                                    <input type="date" name="terima_tanggal" class="form-control" place_holder="Masukan Terima Tanggal..." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" place_holder="Masukan Judul buku...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Kategori</label>
                                    <select class="form-control" name="id_kategori" required>
                                      <option value="">-- Pilih Kategori --</option>
                                      @foreach(\DB::table('kategori')->get() as $data)
                                      <option value="{{$data->id}}">{{$data->nama}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" place_holder="Masukan Tempat Terbit...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" place_holder="Masukan Tempat Terbit...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" place_holder="Masukan Tempat Terbit...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>EXP</label>
                                    <input type="text" name="exp" class="form-control" place_holder="Masukan Tempat Terbit...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>CNB</label>
                                    <input type="text" name="cnb" class="form-control" place_holder="Masukan Terima Tanggal..." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Asal Buku</label>
                                    <input type="text" name="asal_buku" class="form-control" place_holder="Masukan Terima Tanggal..." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tempat Terbit</label>
                                    <input type="text" name="tempat_terbit" class="form-control" place_holder="Masukan Tempat Terbit...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Stok</label>
                                    <input type="text" name="stok" class="form-control" place_holder="Masukan Id Pengarang...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Ketersedian</label>
                                    <input type="text" name="ketersedian" class="form-control" place_holder="Masukan Terima Tanggal..." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control" place_holder="Masukan Foto...." value="">
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
