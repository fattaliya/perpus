<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\Http\Controllers\Administrator;
use App\Http\Controllers;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('template.index');
})->name('index');

Route::get('/cari', 'FrontController@cari');
Route::get('/cari-buku/{kategori}', 'FrontController@cari_buku');
Route::get('/search-auto-db', 'FrontController@searchQuery');


Route::get('/masuk', 'MasukController@create');

Auth::routes();




//Route::group(['middleware' => 'Administrator'], function(){



Route::get('/admin/dashboard', 'Admin\DashboardController@index');
Route::get('barcode', 'Admin\DashboardController@barcode');


//Penerbit

Route::get('/admin/penerbit', 'Admin\PenerbitController@read');
Route::get('/admin/penerbit/add', 'Admin\PenerbitController@add');
Route::post('/admin/penerbit/create', 'Admin\PenerbitController@create');
Route::get('/admin/penerbit/edit/{id}', 'Admin\PenerbitController@edit');
Route::post('/admin/penerbit/update/{id}', 'Admin\PenerbitController@update');
Route::get('/admin/penerbit/delete/{id}', 'Admin\PenerbitController@delete');

//Pengarang
Route::get('/admin/pengarang', 'Admin\pengarangController@read');
Route::get('/admin/pengarang/add', 'Admin\pengarangController@add');
Route::post('/admin/pengarang/create', 'Admin\pengarangController@create');
Route::get('/admin/pengarang/edit/{id}', 'Admin\pengarangController@edit');
Route::post('/admin/pengarang/update/{id}', 'Admin\pengarangController@update');
Route::get('/admin/pengarang/delete/{id}', 'Admin\pengarangController@delete');
Route::get('/admin/pengarang/cari', 'Admin\PengarangController@cari');


//Kategori
Route::get('/admin/kategori', 'Admin\kategoriController@read');
Route::get('/admin/kategori/add', 'Admin\KategoriController@add');
Route::post('/admin/kategori/create', 'Admin\KategoriController@create');
Route::get('/admin/kategori/edit/{id}', 'Admin\KategoriController@edit');
Route::post('/admin/kategori/update/{id}', 'Admin\KategoriController@update');
Route::get('/admin/kategori/delete/{id}', 'Admin\KategoriController@delete');


//Rak
Route::get('/admin/rak', 'Admin\rakController@read');
Route::get('/admin/rak/add', 'Admin\rakController@add');
Route::post('/admin/rak/create', 'Admin\rakController@create');
Route::get('/admin/rak/edit/{id}', 'Admin\rakController@edit');
Route::post('/admin/rak/update/{id}', 'Admin\rakController@update');
Route::get('/admin/rak/delete/{id}', 'Admin\rakController@delete');

//Kelas
Route::get('/admin/kelas', 'Admin\kelasController@read');
Route::get('/admin/kelas/add', 'Admin\kelasController@add');
Route::post('/admin/kelas/create', 'Admin\kelasController@create');
Route::get('/admin/kelas/edit/{id}', 'Admin\kelasController@edit');
Route::post('/admin/kelas/update/{id}', 'Admin\kelasController@update');
Route::get('/admin/kelas/delete/{id}', 'Admin\kelasController@delete');

//Denda
Route::get('/admin/denda', 'Admin\dendaController@read');
Route::get('/admin/denda/add', 'Admin\dendaController@add');
Route::post('/admin/denda/create', 'Admin\dendaController@create');
Route::get('/admin/denda/edit/{id}', 'Admin\dendaController@edit');
Route::post('/admin/denda/update/{id}', 'Admin\dendaController@update');
Route::get('/admin/denda/delete/{id}', 'Admin\dendaController@delete');


//Cari Kategori
Route::get('/kategori', 'FrontController@carikategori')->name('kategori.buku');

//Data Siswa


Route::get('/admin/data_siswa', 'Admin\datasiswaController@read');
Route::get('/admin/data_siswa/add', 'Admin\datasiswaController@add');
Route::post('/admin/data_siswa/create', 'Admin\datasiswaController@create');
Route::get('/admin/data_siswa/edit/{id}', 'Admin\datasiswaController@edit');
Route::post('/admin/data_siswa/update/{id}', 'Admin\datasiswaController@update');
Route::get('/admin/data_siswa/delete/{id}', 'Admin\datasiswaController@delete');
Route::get('/admin/data_siswa/status_akun/{id}', 'Admin\datasiswaController@status_akun');
Route::get('/admin/data_siswa/konfirmasi', 'Admin\datasiswaController@konfrimasi');
Route::get('/admin/data_siswa/detail/{nis}', 'Admin\datasiswaController@detail');
Route::get('/admin/peminjaman/detail/print_data_siswa', 'Admin\peminjamanController\detail@print_data_siswa');
Route::get('/admin/data_siswa/cari', 'Admin\DatasiswaController@cari');
Route::get('/admin/data_siswa/print_data_anggota', 'Admin\datasiswaController@print_data_anggota');
Route::get('/admin/data_siswa/print', 'Admin\datasiswaController@print');


//Buku
Route::get('/admin/buku', 'Admin\bukuController@read');
Route::get('/admin/buku/add', 'Admin\bukuController@add');
Route::post('/admin/buku/create', 'Admin\bukuController@create');
Route::get('/admin/buku/edit/{id}', 'Admin\bukuController@edit');
Route::post('/admin/buku/update/{id}', 'Admin\bukuController@update');
Route::get('/admin/buku/delete/{id}', 'Admin\bukuController@delete');
Route::get('/admin/buku/buku/{id}', 'Admin\bukuController@buku');
Route::get('/admin/buku/cari', 'Admin\BukuController@cari');
Route::get('/admin/buku/print_buku', 'Admin\bukuController@print_buku');
Route::get('/admin/buku/print', 'Admin\bukuController@print');


//Peminjaman
Route::get('/admin/peminjaman', 'Admin\peminjamanController@read');
Route::get('/admin/peminjaman/add', 'Admin\peminjamanController@add');
Route::get('/admin/peminjaman/create/{id}', 'Admin\peminjamanController@create');
Route::get('/admin/peminjaman/edit/{id}', 'Admin\peminjamanController@edit');
Route::post('/admin/peminjaman/update/{id}', 'Admin\peminjamanController@update');
Route::get('/admin/peminjaman/delete/{id}', 'Admin\peminjamanController@delete');
Route::get('/admin/peminjaman/kembali/{id}', 'Admin\peminjamanController@kembali');
Route::get('/admin/peminjaman/kembali/{id}', 'Admin\peminjamanController@kembali');

Route::get('/admin/peminjaman/getdenda/{id}', 'Admin\peminjamanController@getdenda');
Route::post('/admin/peminjaman/denda', 'Admin\peminjamanController@denda');
Route::get('/admin/peminjaman/getKehilangan/{id}', 'Admin\peminjamanController@getKehilangan');
Route::post('/admin/peminjaman/kehilangan', 'Admin\peminjamanController@Kehilangan');
Route::get('/admin/peminjaman/print', 'Admin\peminjamanController@print');
Route::get('/admin/peminjaman/print_peminjaman', 'Admin\peminjamanController@print_peminjaman');







//Pengembalian
Route::get('/admin/pengembalian', 'Admin\pengembalianController@read');
Route::get('/admin/pengembalian/add', 'Admin\pengembalianController@add');
Route::post('/admin/pengembalian/create', 'Admin\pengembalianController@create');
Route::get('/admin/pengembalian/edit/{id}', 'Admin\pengembalianController@edit');
Route::post('/admin/pengembalian/update/{id}', 'Admin\pengembalianController@update');
Route::get('/admin/pengembalian/delete/{id}', 'Admin\pengembalianController@delete');

//});

// Route::group(['middleware' => 'petugas'], function(){
Route::get('/admin/peminjaman/add', 'Admin\peminjamanController@add');
Route::post('/admin/peminjaman/create', 'Admin\peminjamanController@create');
Route::get('/admin/pengembalian/add', 'Admin\pengembalianController@add');
Route::post('/admin/pengembalian/create', 'Admin\pengembalianController@create');
// });

// Route::resource('/admin/transaksi', 'Admin\TransaksiController');
Route::get('/laporan/trs', 'LaporanController@transaksi');

//dashboard
Route::get('/admin', 'Admin\DashboardController@index');

Route::get('template/cari', 'FrontController@cari');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
