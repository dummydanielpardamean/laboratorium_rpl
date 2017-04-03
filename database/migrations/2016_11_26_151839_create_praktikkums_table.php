<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraktikkumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktikkum', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 60);
            $table->text('keterangan');
            $table->string('program_studi', 20);
            $table->integer('angkatan')->unsigned();
            $table->integer('id_ruang')->unsigned();
            $table->string('nip', 10);
            $table->timestamp('tanggal_waktu_mulai_praktikkum')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tanggal_waktu_akhir_praktikkum')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:drop('praktikum');
    }
}
