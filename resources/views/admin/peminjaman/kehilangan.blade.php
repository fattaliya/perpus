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
                                    <h2 class="card-title text-primary">Edit kehilangan</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/peminjaman" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/peminjaman/kehilangan" method="POST">
                                @csrf
                                {{-- <div class="form-group mb-3">
                                    <label>Nama Peminjam</label>
                                    <select class="form-control" name="id_siswa" required>
                                    <option value="">-- Pilih Siswa --</option>
                                     @foreach(\DB::table('data_siswa')->get() as $data)
                                      <option value="{{$data->id}}">{{$data->nama_siswa}}</option>
                                      @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group mb-3">
                                    <input type="text" name="id" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$peminjaman->id}}">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="id_buku" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$peminjaman->id_buku}}">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="kehilangan" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$kategori->kehilangan}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Nama Buku yang Hilang</label>
                                    <input type="text" name="judul" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$buku->judul}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$peminjaman->tanggal_pinjam}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Laporan</label>
                                    <input type="date" name="tanggal_lapor" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$tgllapor}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Alasan</label>
                                    <input type="text" name="alasan" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                </div>
                                @if($kategori->kehilangan == "Buku" ||$kategori->kehilangan == "buku" )

                                    <div class="form-group mb-3">
                                        <label>Judul Buku Pengganti</label>
                                        <input type="text" name="pengganti" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Pengarang</label>
                                        <input type="text" name="pengarang" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Penerbit</label>
                                        <input type="text" name="penerbit" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tempat Terbit</label>
                                        <input type="text" name="tempat_terbit" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                    </div>

                                @else
                                <div class="form-group mb-3">
                                    <label>Nominal Uang Pengganti</label>
                                    <input type="text" name="pengganti" class="form-control" place_holder="Masukan Judul peminjaman...." value="{{$kategori->jumlah}}" readonly>
                                </div>
                                @endif

                                {{-- <div class="form-group mb-3">
                                    <label>Buku</label>
                                    <select class="form-control" name="id_buku" required>
                                      <option value="{{$buku->id}}">{{$buku->judul}}</option>
                                      @foreach($bukuAll as $data)
                                      <option value="{{$data->id}}">{{$data->judul}}</option>
                                      @endforeach
                                    </select>
                                </div> --}}

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
