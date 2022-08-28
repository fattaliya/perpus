<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class DataSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis',50);
            $table->string('nama_siswa',50);
            $table->string('status',50);
            // $table->string('id_kelas');
            $table->string('jenis_kelamin',10);
            $table->string('status_akun',10);
            $table->string('no_wa',12);
            $table->string('pesan',100);
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
        Schema::dropIfExists('data_siswa');
    }
}
