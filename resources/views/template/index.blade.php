<!doctype html>
<html lang="en">
  <head>
  	<title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">

	{{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
	<link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/home/ionicons/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
  </head>
  <body>

	<nav class="navbar navbar-expand-lg navbar-detached navbar-dark" style="background-color:#001746;">
		<div class="container">
		<a class="navbar-brand" href="{{ route('index') }}">
			<img src="assets/img/logos/smk.png" width="40" alt="logo"  class="mb-0 font-sans-serif fw-bold fs-md-5 fs-lg-1">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
			<li class="navbar-brand nav-item">
			  <a class="nav-link" href="{{ route('login') }}">SMK NEGERI 1 BATIPUH</a>
			</li>
		  </ul>
		  <ul class="nav navbar-nav ml-auto">
			@guest
			 <li class="nav-item">
			  <a href="{{url('/masuk')}}" class="btn btn-outline-success">Register </a>
			</li>
			{{-- <li class="nav-item">
			  <a class="nav-link" href="{{url('/register')}}">Register</a>
			</li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/login')}}">Login</a>
              </li>
 --}}



			@else
			<li class="nav-item dropdown">
			  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->name }}
			  </a>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a href="/admin" class="dropdown-item">Dashboard</a>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				  @csrf
				</form>
			  </div>
			</li>
			@endguest

		  </ul>
		</div>
	</div>
	</nav>


	<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4 text-center">Pencarian Buku</h1>
          <p class="lead text-center">Kamu bisa mencari Buku apapun yang kamu mau.</p>
          <div class="input-group mb-3">
              {{-- <input type="text" class="typeahead form-control" name="cari" placeholder="Cari Buku"> --}}
              <input class="typeahead form-control" type="text" placeholder="Ketikkan Kategori Buku Pilihan Anda...">
              <div class="input-group-append">
                  <button class="btn btn-primary" onclick="cari()"># Temukan Pencarian Anda... </button>
                </div>

            </div>
            <ul>
                <li>
                    <small class="text-primary">Awali Pencarian dengan Kata Buku, Misal : Buku Pelajaran, Buku Teknologi, dll...</small>
                </li>
            </ul>

        </div>
      </div>

		<section class="ftco-section">
			<div class="container">
                <div class="row">
                    <div class="col-md-12" id="tampilBuku" >
                    </div>
                </div>
                <hr>
				<div class="row mb-5">
					<div class="col-md-12">
						<h5 class=" mb-2">Koleksi sering dipinjam</h5>
                        <br>
					</div>
					<div class="col-md-12">
                        @php
                        $pinjam = DB::table('peminjaman')
                        ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
                        ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
                        ->groupBy('peminjaman.id_buku')->get();
                    @endphp
						<div class="featured-carousel owl-carousel">

							@foreach($pinjam as $data)
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/foto/{{$data->foto}});">
										<div class="text w-100">
											<span class="cat" style="font-size: 8px">{{ucwords($data->nama)}}</span>
											<h3><a href="#">{{$data->judul}}</a></h3>
											<h4>Stok : <b>{{$data->stok}}</b></h4>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
                <hr>
				<div class="row bg-light">
					<div class="col-md-12">
						<h5 class=" mb-2">Koleksi terbaru</h5>
					</div>
					<div class="col-md-12">
                        @php
                        $buku_terbaru = DB::table('buku')
                        ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
                        ->orderBy('buku.terima_tanggal', 'DESC')->get();
                    @endphp
						<div class="featured-carousel owl-carousel">
							@foreach($buku_terbaru as $b)
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/foto/{{$b->foto}});">
										<div class="text w-100">
											<span class="cat" style="font-size: 8px">{{$b->nama}}</span>
											<h3><a href="#">{{$b->judul}}</a></h3>
											<h4>Stok : <b>{{$data->stok}}</b></h4>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
    {{-- <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script> --}}


    <script src="{{ asset('assets/home/js/popper.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/main.js') }}"></script>
    <script type="text/javascript">
        var path = "{{ url('search-auto-db') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });

        function cari(){

            var kategori = $('input.typeahead').val();

            if(kategori == ''){
                alert('ketikkan kategori buku terlebih dahulu')
            }else{
                $('#tampilBuku').html('');
                $('#tampilBuku').append('<h5 class="text-danger text-center" style="font-weight: 600;font-size: 13px">Loading Data...</h5>');
                var q = kategori.replace(/ /g, '-');
                var url = "{{ url('/cari-buku') }}/"+q;
                setTimeout(() => {
                    $('#tampilBuku').html('');
                    $('#tampilBuku').load(url);
                }, 1000);
            }
        }
    </script>
  </body>
</html>
