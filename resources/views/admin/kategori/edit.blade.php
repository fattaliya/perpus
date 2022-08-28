
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
                                    <h2 class="card-title text-primary">Edit Data Kategori</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/kategori" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/kategori/update/{{$kategori->id}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Nama kategori</label>
                                    <input type="text" name="nama" class="form-control" place_holder="Masukan Nama kategori...." value="{{$kategori->nama}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Denda Kategori</label>
                                    <input type="text" name="denda" class="form-control" place_holder="Masukan Denda...." value="{{$kategori->denda}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Satuan Denda</label>
                                    <input type="text" name="satuan_denda" class="form-control" place_holder="Masukan Satuan...." value="{{$kategori->satuan_denda}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Nominal Denda</label>
                                    <input type="text" name="nominal" class="form-control" place_holder="Masukan Nominal...." value="{{$kategori->nominal}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Kehilangan</label>
                                    <input type="text" name="kehilangan" class="form-control" place_holder="Masukan Kehilangan...." value="{{$kategori->kehilangan}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jumlah Denda</label>
                                    <input type="text" name="jumlah" class="form-control" place_holder="Masukan Jumlah...." value="{{$kategori->jumlah}}">
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
