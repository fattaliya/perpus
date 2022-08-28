<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peminjaman extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa',10);
            $table->date('tanggal_pinjam',20);
            $table->date('tanggal_kembali',20);
            $table->date('tanggal_pengembalian',20)->nullable();
            $table->string('id_buku',10);
            $table->string('id_denda',10);
            $table->string('status_buku',20)->nullable();
            $table->string('status_peminjaman')->nullable();

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
        Schema::dropIfExists('peminjaman');
    }
}
