<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratPengantar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pengantar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surat_pengantar')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('rt_id')->nullable();
            $table->smallInteger('status')->nullable();
            $table->dateTime('date_proses')->nullable();
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
        Schema::dropIfExists('surat_pengantar');
    }
}
