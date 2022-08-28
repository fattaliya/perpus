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
                                    <h2 class="card-title text-primary">Edit Data Penerbit</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/penerbit" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/penerbit/update/{{$penerbit->id}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Nama Penerbit</label>
                                    <input type="text" name="nama" class="form-control" place_holder="Masukan Nama Penerbit...." value="{{$penerbit->nama}}">
                                </div>
                                {{-- <div class="form-group mb-3">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" place_holder="Masukan Tahun...." value="{{$penerbit->tahun}}">
                                </div> --}}
                                <div class="form-group mb-3">
                                    <label>Lokasi Penerbit</label>
                                    <input type="text" name="lokasi" class="form-control" place_holder="Masukan Lokasi Penerbit...." value="{{$penerbit->lokasi}}">
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
