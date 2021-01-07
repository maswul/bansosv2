<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokmas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama')->unique();
            $table->string('desa');
            $table->string('kec');
            $table->string('kab');
            $table->string('keg');
            $table->integer('user_id');
            $table->string('status')->default('new');
            $table->integer('pagu')->default(0);
            $table->string('kontak_nama')->nullable();
            $table->string('kontak_noHP')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokmas');
    }
}
