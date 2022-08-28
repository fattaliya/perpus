<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kehilangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehilangan', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan')->nullable;
            $table->string('id_penganti')->nullable;
            $table->string('id_peminjaman')->nullable;


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
        Schema::dropIfExists('kehilangan');
    }
}
