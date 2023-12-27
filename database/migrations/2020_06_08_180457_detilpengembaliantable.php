<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detilpengembaliantable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //    Schema::create('detil_pengembalians', function (Blueprint $table) {

        //     $table->integer('pengembalians_id')->unsigned();
        //     $table->foreign('pengembalians_id')->references('id')->on('pengembalians');

        //     $table->integer('buku_id')->unsigned();
        //     $table->foreign('buku_id')->references('id')->on('bukus');

        //     $table->integer('jumlah_kembali');
        //     $table->integer('terlambat_hari');
        //     $table->integer('denda');
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //       Schema::dropIfExists('detil_pengembalians');
    }
}
