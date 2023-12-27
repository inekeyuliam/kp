<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dendas', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('kode_denda');
            $table->integer('detil_transaksi_id')->unsigned();
            $table->foreign('detil_transaksi_id')->references('id')->on('detil_transaksis');
            $table->enum('status',['lunas','belum']);
            $table->integer('denda')->nullable();
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
        Schema::dropIfExists('dendas');

    }
}
