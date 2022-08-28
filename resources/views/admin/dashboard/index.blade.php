@extends('admin.layouts.app', [
    'activePage' => 'dashboard',
  ])
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-12 mb-8 order-0">

       <br>
              <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-5">
                    <div class="card-body">

                    @if(Auth::User()->jabatan == "admin")
                          <h5 class="card-title text-primary">KO ADMIN 🎉
                          </h5>
                          @elseif(Auth::User()->jabatan == "petugas")
                          <h5 class="card-title text-primary">KO PETUGAS 🎉</h5>
                          @endif
                        </div>

                    </div>
                    <div class="col-sm-5 text-center text-sm-right">
                      <div class="card-body pb-0 px-0 px-md-12">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <br>



                  <!-- </div>
                <div class="row"> -->

                </div>
              </div>
            </div>
@endsection
