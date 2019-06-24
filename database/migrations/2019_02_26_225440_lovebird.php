<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lovebird extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lovebird', function (Blueprint $table) {
                 //id
                 $table->increments('id');
                 //attr
                 $table->unsignedInteger('idjenis_lovebird');
                 $table->string('nama')->nullable();
                 $table->string('induk_jantan')->nullable();
                 $table->string('induk_betina')->nullable();
                 $table->string('kode_ring');
                 $table->string('warna_mutasi');
                 $table->string('jenis_kelamin');
                 $table->date('tanggal_lahir');
                 $table->integer('harga')->nullable();
                 $table->boolean('dijual')->nullable();
                 $table->boolean('status')->nullable();
                 $table->string('deskripsi');
                 $table->unsignedInteger('id_user');

     
     
                 //timestamp
                 $table->softDeletes();
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
        Schema::dropIfExists('lovebird');
    }
}
