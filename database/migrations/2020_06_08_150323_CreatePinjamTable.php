<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //    Schema::create('pinjams', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('anggota_id')->unsigned();
        //     $table->foreign('anggota_id')->references('id')->on('anggotas');
            
        //     $table->date('tgl_pinjam');
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
         // Schema::dropIfExists('pinjams');
    }
}
