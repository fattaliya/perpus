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
                                    <h2 class="card-title text-primary">Tambah Data Rak</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/rak" class="btn btn-md btn-block btn-secondary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/rak/create" method="POST">
                                @csrf
                                {{-- <div class="form-group mb-3">
                                    <label>Nama Buku</label>
                                    <input type="text" name="nama" class="form-control" place_holder="Masukan Nama Buku...." value="">
                                </div> --}}
                                 <div class="form-group mb-3">
                                    <label>Nomor Rak</label>
                                    <input type="text" name="nomor" class="form-control" place_holder="Masukan Nomor Rak...." value="">
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
