<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('detil_transaksis', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('kode_transaksi');
            $table->integer('anggota_id')->unsigned();
            $table->foreign('anggota_id')->references('id')->on('anggotas');
            $table->integer('buku_id')->unsigned();
            $table->foreign('buku_id')->references('id')->on('bukus');
            $table->date('tgl_kembali')->nullable();
            $table->date('tgl_pinjam');
            $table->date('tgl_batas');
            $table->integer('terlambat')->nullable();
            $table->enum('status',['pinjam','kembali']);
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
           
         Schema::dropIfExists('detil_transaksis');
    }
}
