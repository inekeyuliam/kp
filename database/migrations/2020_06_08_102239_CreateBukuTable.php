<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->increments('id')->unique();
            $table->string('kode_anggota')->unique();
            $table->integer('no_induk')->unique();
            $table->date("tanggal");
            $table->string('nama');
            $table->enum('kelas',['VII','VIII','IX']);
            $table->enum('jenis_kelamin',['perempuan','laki-laki']);
            $table->string('email');
            $table->string('telepon');
            $table->string('alamat');
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
      Schema::dropIfExists('anggotas');

    }
}
