<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->integer('nama_siswa_id')->unsigned();
            // $table->foreign('nama_siswa_id')->references('id')->on('nama_siswa')->onDelete('cascade');
            $table->integer('buku_id')->unsigned();
            // $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->text('ket')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::dropIfExists('kategori');
    }
}
