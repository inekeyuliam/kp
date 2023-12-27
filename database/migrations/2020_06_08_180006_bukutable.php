<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bukutable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_buku')->unique();
            $table->integer('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id')->on('kategori_bukus');
            $table->string('judul');
            $table->integer('penulis_id')->unsigned();
            $table->foreign('penulis_id')->references('id')->on('penulis_buku');
            $table->integer('penerbit_id')->unsigned();
            $table->foreign('penerbit_id')->references('id')->on('penerbit_bukus');
            $table->string('ISBN');
            $table->integer('tahun_terbit');
            $table->integer('quantity');
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
             Schema::dropIfExists('bukus');
    }
}
