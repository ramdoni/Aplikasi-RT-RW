<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerumahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perumahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_perumahan')->nullable();
            $table->integer('provinsi_id')->nullable();
            $table->integer('kabupaten_id')->nullable();
            $table->bigInteger('kecamatan_id')->nullable();
            $table->bigInteger('kelurahan_id')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('perumahan');
    }
}
