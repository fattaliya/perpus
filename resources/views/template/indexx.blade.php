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

		</div>
	</div>
	</nav>




<!-- ============================================-->
      <!-- <section> begin ============================-->
        @foreach(App\Buku::get() as $data)
        <section class="py-6">
          <div class="container">




        <div class="card" style="width: 300px;">
          <img src="/foto/{{$data->foto}}" class="card-img-top" alt="...">
          <div class="card-body text-center">
              <h5 class="card-title">{{$data->judul}}</th>
              <h5 class="card-title">{{$data->stok}}</th>
          </div>
      </div>



      @endforeach





    </form>
    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/popper.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/main.js') }}"></script>
  </body>
</html>
