<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Data Rapor</title>

    <style>
		body {
			padding: 0;
			margin: 0;`
		}

		.page {

			/* margin: 0 auto;' */
			/* position: absolute; */
			/* top: 170px; */
			position: relative;
			top: 25;
		}

		table th,
		table td {
			text-align: left;
		}

		table.layout {
			width: 100%;
			border-collapse: collapse;
		}

		table.display {
			margin: 1em 0;
		}

		table.display th,
		table.display td {
			border: 1px solid #aabebf;
			padding: .5em 1em;
		}

		table.display th {
			background: #93e2d5;
		}

		table.display td {
			background: #fff;
		}

		/* table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }  */

		.customer {
			padding-left: 600px;
		}

		.logo {
			position: absolute;
			left: 0px;
			top: 20px;
			z-index: 999;
		}

		.logo-baru {
			position: absolute;
			right: 0px;
			top: 20px;
			z-index: 999;
		}

		.koplaporan {
			height: 120px;
		}

		.logo img {
			width: 80px;
			height: 80px;

		}

		.logo-baru img {
			width: 120px;
			height: 80px;

		}

		.judul {
			/* position: absolute; */
			top: 0;
			text-align: center;
		}

		.garis {
			/* margin-top: 160px; */
			height: 3px;
			border-top: 3px solid black;
			border-bottom: 1px solid black;
		}

		.info {
			/* position: relative; */

            top: 60px;
			font-size: 20px;
            text-align: center;
		}

		.sub-header {
			font-size: 20px;
		}
	</style>

</head>



<body onload="window.print()">
	<div class="header">
        <div class="koplaporan">
            <div class="column md-6">
                <div class="logo">
                    <img src="{{ asset('img/artistic.png') }}">
                </div>
            </div>
            <div class="column md-6">
                <div class="judul">
                    <h2>
                       SMK NEGERI 1 BATIPUH
                    </h2>
                    <div style="margin-top:-1em;margin-bottom:.9em">
                        <span class="sub-header">Alamat : Jl. Raya Padang Panjang – Solok</span><br>
                        <span>Km. 6. 5 Baruah, Kec. Batipuh, Kab. Tanah Datar, Sumbar, 27265</span><br>
                    </div>
                </div>
            </div>

            <div class="garis"></div>
        </div>
	</div>

    <div style="margin-top:30px;">
		<h3><strong><center>Laporan Buku Perpustakaan</center></strong> <br></h3>

	</div>

	<div class="page">
		<table class="layout display responsive-table" style="font-size: 18px">
			<thead>
                <tr>
                    <th>No</th>
                    <th>nis</th>
                    <th>Nama</th>
                    {{-- <th>kelas</th> --}}
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                </tr>
                <?php $no = 1; ?>
                @foreach($data_siswa as $data)
                <?php
                //   $kelas = DB::table('kelas')->find($data->id_kelas);
                ?>
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->nis}}</td>
                    <td>{{$data->nama_siswa}}</td>
                    {{-- <td>{{$data->kelas}}</td> --}}
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{$data->status}}</td>
                </tr>
                @endforeach
		</table>

	</div>

</body>

</html>
