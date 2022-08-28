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
                                    <h2 class="card-title text-primary">Edit Data Denda</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/denda" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>    
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/denda/update/{{$denda->id}}" method="POST">
                                @csrf
                                 <div class="form-group mb-3">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" place_holder="Masukan Keterangan...." value="{{$denda->keterangan}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jumlah Denda</label>
                                    <input type="text" name="jumlah_denda" class="form-control" place_holder="Masukan Jumlah Denda..." value="{{$denda->jumlah_denda}}">
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