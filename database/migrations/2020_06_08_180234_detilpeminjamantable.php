<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detilpeminjamantable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  Schema::create('detil_pinjams', function (Blueprint $table) {

        //     $table->integer('pinjam_id')->unsigned();
        //     $table->foreign('pinjam_id')->references('id')->on('pinjams');

        //     $table->integer('buku_id')->unsigned();
        //     $table->foreign('buku_id')->references('id')->on('bukus');

        //     $table->integer('jumlah_pinjam');
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
     // Schema::dropIfExists('detil_pinjams');

    }
}
