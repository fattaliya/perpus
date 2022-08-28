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
			  <a class="nav-link" href="{{ route('index') }}">SMK NEGERI 1 BATIPUH</a>
			</li>
		  </ul>
		  <ul class="nav navbar-nav ml-auto">
			@guest
			<li class="nav-item">
			  <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
			</li>
			<li class="nav-item">
			  <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
			</li>
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
		@csrf
        <div class="container">
          <h1 class="display-4 text-center">Pencarian Buku</h1>
          <p class="lead text-center">Kamu bisa mencari Buku apapun yang kamu mau.</p>
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="kategori" placeholder="Cari Buku" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <a href="{{route('kategori.buku')}}" class="btn btn-primary" id="search">Search</a></button>
              </div>
            </div>
        </div>
      </div>

		<section class="ftco-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-12">
						<h2 class="heading-section mb-2">Koleksi sering dipinjam</h2>
					</div>
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel">
							@foreach($buku as $data) 
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/foto/{{$data->foto}});">
										<div class="text w-100">
											<span class="cat">{{$data->kategori}}</span>
											<h3><a href="#">{{$data->judul}}</a></h3>
											<h4>Stok : {{$data->stok}}</h4>
										</div>
									</div>
								</div>
							</div>
							@endforeach 
			</div>
		</section>

    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/popper.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/main.js') }}"></script>
  </body>
</html>