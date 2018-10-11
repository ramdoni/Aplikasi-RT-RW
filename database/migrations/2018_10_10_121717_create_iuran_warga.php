<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIuranWarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iuran_warga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->smallInteger('tahun')->nullable();
            $table->smallInteger('bulan')->nullable();
            $table->integer('nominal')->nullable();
            $table->smallInteger('status')->nullable();
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
        Schema::dropIfExists('iuran_warga');
    }
}
