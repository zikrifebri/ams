<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama_departement', 50);
        });

        Schema::table('tbl_surat_masuk', function (Blueprint $table) {
            $table->foreign('id_departement')
                  ->references('id')
                  ->on('departement')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        Schema::table('tbl_surat_keluar', function (Blueprint $table) {
            $table->foreign('id_departement')
                  ->references('id')
                  ->on('departement')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_surat_masuk', function (Blueprint $table) {
            $table->dropForeign('tbl_surat_masuk_id_departement_foreign');
        });

        Schema::table('tbl_surat_keluar', function (Blueprint $table) {
            $table->dropForeign('tbl_surat_keluar_id_departement_foreign');
        });
        
        Schema::dropIfExists('departement');
    }
}
