<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terusans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tbl_surat_masuk_id');
            $table->integer('user_id');
            $table->date('tgl_diteruskan');
            $table->string('yang_meneruskan');
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
        Schema::dropIfExists('terusans');
    }
}
