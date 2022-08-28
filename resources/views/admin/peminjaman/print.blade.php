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


                                </div>

                            </div>
                          <hr>

                          <form action="" method="GET" class="form-group">
                            {{ csrf_field() }}
                             <select style="cursor:pointer;" class="form-control" id="tag_select" name="year">
                            <option value="0" selected disabled> Pilih Tahun</option>
                            <?php
                             $year = date('Y');
                             $min = $year - 60;
                             $max = $year;
                             for( $i=$max; $i>=$min; $i-- ) {
                            echo '<option value='.$i.'>'.$i.'</option>';
                                                  }
                                                ?>
                             </select>
                             <select style="cursor:pointer;margin-top:1.5em;margin-bottom:1.5em;" class="form-control" id="tag_select" name="month">
                                <option value="0" selected disabled> Pilih Bulan</option>
                            <option value="01"> Januari</option>
                            <option value="02"> Februari</option>
                            <option value="03"> Maret</option>
                            <option value="04"> April</option>
                            <option value="05"> Mei</option>
                            <option value="06"> Juni</option>
                            <option value="07"> Juli</option>
                            <option value="08"> Agustus</option>
                            <option value="09"> September</option>
                            <option value="10"> Oktober</option>
                            <option value="11"> November</option>
                            <option value="12"> Desember</option>
                            </select>


                            <a href="/admin/peminjaman/print_peminjaman" class="btn btn-md btn-block btn-success"><i class="fa fa-print"></i> Print</a>

                        </form>



                    <?php
                    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                            $tgl = date('d-m-y', strtotime($_GET['tanggal']));
                            echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';
                            echo '<a href="print.php?filter=1&tanggal='.$_GET['tanggal'].'">Cetak PDF</a><br /><br />';
                            $query = "SELECT * FROM transaksi WHERE DATE(tgl)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
                        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                            echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
                            echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';
                            $query = "SELECT * FROM transaksi WHERE MONTH(tgl)='".$_GET['bulan']."' AND YEAR(tgl)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                        }else{ // Jika filter nya 3 (per tahun)
                            echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';
                            echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';
                            $query = "SELECT * FROM transaksi WHERE YEAR(tgl)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                        }
                    }else{ // Jika user tidak mengklik tombol tampilkan
                        // echo '<b>Semua Data Transaksi</b><br /><br />';

                        $query = "SELECT * FROM transaksi ORDER BY tgl"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
                    }
                    ?>

</div>
 </div>
</div>
</div>
</div>
</div>
</div>
@endsection
