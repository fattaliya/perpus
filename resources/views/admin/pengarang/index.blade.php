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
                                    {{-- <h2 class="card-title text-primary">List Data Pengarang</h2> --}}
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/pengarang/add" class="btn btn-md btn-block btn-primary"><i class="bx bx-plus"></i></a>
                                </div>
                                <form action="/admin/pengarang/cari" method="GET">
                                    <input type="text" name="cari" placeholder="Cari Pengarang .." value="{{ old('cari') }}">
                                    <input type="submit" value="CARI">
                                </form>
                            </div>
                          <hr>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">
                <h3 class="card-title">List Data Pengarang</h4>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                           <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                <?php $no = 1; ?>
                                @foreach($pengarang as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td class="text-center">
                                        <a href="/admin/pengarang/edit/{{$data->id}}" class="btn btn-sm btn-success"><i class="bx bx-pencil"></i></a>
                                        <form action="/admin/denda/delete/{{$data->id}}" method="get" class="-inline" onsubmit="return confirm('Yakin anda mau menghapus')">
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
