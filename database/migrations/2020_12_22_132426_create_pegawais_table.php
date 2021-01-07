<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nip')->unique();
            $table->string('nama')->unique();
            $table->string('pangkat')->nullable();
            $table->string('gol')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('profile_path')->nullable();
            $table->string('noHP')->nullable();
            $table->string('satuan_kerja')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
