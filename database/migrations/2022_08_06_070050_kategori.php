<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kategori extends Migration
{
    /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
         Schema::create('kategori', function (Blueprint $table) {
             $table->id();
             $table->string('nama',50);
             $table->string('denda',10);
             $table->string('satuan_denda',10)->nullable();
             $table->string('nominal',10)->nullable();
             $table->string('kehilangan',10)->nullable();
             $table->string('jumlah',10)->nullable();
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
