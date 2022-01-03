<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_surat_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_agenda');
            $table->string('no_surat', 250);
            $table->integer('id_departement')->unsigned();
            $table->string('perihal', 150);
            $table->string('kode', 50);
            $table->date('tgl_surat');
            $table->date('tgl_diterima');
            $table->string('keterangan', 250);           
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_surat_masuk');
    }
}
