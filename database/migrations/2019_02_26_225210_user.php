<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            //id
            $table->increments('id');
            //attr
            $table->string('id_breeder')->nullable();
            $table->string('nama')->nullable();
            $table->string('noktp')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('domisili')->nullable();
            $table->string('lokasigmap')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('isAdmin')->nullable();
            $table->boolean('status')->nullable();


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
        Schema::dropIfExists('user');
    }
}
