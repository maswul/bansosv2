<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->integer('lama_perjalanan');
            $table->string('berangkat_dari');
            $table->string('kota_tujuan');
            $table->string('alat_angkut');
            $table->string('dasar');
            $table->string('kegiatan');
            $table->string('pelaksana');
            $table->integer('pelaksana_id');
            $table->string('pejabat_sppd');
            $table->integer('pejabat_sppd_id');
            $table->string('pejabat_ppk');
            $table->integer('pejabat_ppk_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spts');
    }
}
