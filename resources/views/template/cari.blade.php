<div style="background-color: #e9ecef;padding:50px;border-radius: 20px">

<h5 class=" mb-2">Hasil Pencarian Kategori : <b><i><u>{{ ucwords($q) }}</u></i></b></h5>

<i class="text-danger" style="font-weight: 600;font-size: 12px">#Ditemukan {{ count($buku) }} buku untuk kategori ini ..</i>

<hr>
<div class="row">
    @forelse ($buku as $data)
    <div class="col-lg-2 col-md-2" >
        <div class="item">
            <div class="work">
                <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/foto/{{$data->foto}});">
                    <div class="text w-100">
                        <span class="cat" style="font-size: 8px">{{$data->nama}}</span>
                        <h3><a href="#">{{ucwords($data->judul)}}</a></h3>
                        <h4>Stok : <b>{{$data->stok}}</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-lg-12" >
        <h6 class="text-danger text-center" style="font-weight: 700">Buku untuk Kategori <i><u>{{ $q }}</u></i> tidak ditemukan</h6>
    </div>
    @endforelse
</div>


</div>
