<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Custom fonts for this template-->
        <link href="{{asset('../admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('../admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link rel="icon" href="{{asset('images/favicon.png')}}">

    </head>
    <body onload="window.print()">
    <div id="content">


      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h5 mb-2 text-gray-800 font-weight-bold">Kartu  Siswa</h1>
          @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
          @endif

          @if(session('delete_status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('delete_status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
          @endif

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-body">
                  <div class="table-responsive">

                  <div class="box-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <table border="1" align="center">
                <tr>

                  <td><center>
                    <font size="3"><b> SMK NEGERI 1 BATIPUH</font><br>
                    <font size="3"><i>Alamat : Jl. Raya Padang Panjang – Solok</i></font><br>
                    <font size="3">Km. 6. 5 Baruah, Kec. Batipuh, Kab. Tanah Datar, Sumbar, 27265 </font><br>
                  </td>
                  </tr><br>
                  <tr>
                    <td colspan="6"<hr> </td>
                  </td>
                  <tr><td><table align="center">
                    <tr>
                     <br>
                     <td>Nama</td>
                     <td> : {{$data_siswa->nama_siswa}}</td>
                   </tr>
                   <tr>
                     <td>NIS</td>
                     <td> : {{$data_siswa->nis}}</td>
                   </tr>
                   <tr>
                     <td width="300px">Jenis Kelamin</td>
                     <td> : {{$data_siswa->jenis_kelamin}}</td>
                   </tr>

                   <tr>
                       <td>
                       <img src="/foto/{{$data_siswa->foto}}" alt="{{$data_siswa->foto}}" width="80px" height="80px"/>
                       </td>
                   <td width="100px">

                     <br>
                     <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{$data_siswa->nis}}">
                   </td>
                   </tr>
                   <tbody>
                 </table>
                  <br>
                  <br>

            </table>
          <div class="col-md-10" align="center">

</div>
     </div>
                  </div>

              </div>
          </div>

      </div>
      <!-- /.container-fluid -->
  </div>
<!-- End of Main Content -->
<script src="{{asset('../admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('../admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('../admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('../admin/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('../admin/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('../admin/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('../admin/js/demo/chart-pie-demo.js')}}"></script>
    </body>
</html>
