<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Buku extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('nib');
            $table->date('terima_tanggal')->nullable();
            $table->text('judul');
            $table->string('id_kategori',10);
            $table->string('pengarang',10)->nullable();
            $table->string('penerbit',10)->nullable();
            $table->string('lokasi',10)->nullable();
            $table->string('exp',10)->nullable();
            $table->string('cnb',10)->nullable();
            $table->string('asal_buku',50);
            $table->string('tempat_terbit',50)->nullable();
            $table->string('stok',10)->nullable();
            $table->string('ketersedian',50);
            $table->string('foto');


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
        Schema::dropIfExists('buku');
    }
}
