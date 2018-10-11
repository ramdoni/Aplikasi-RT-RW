<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratPengantarDomisili extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pengantar_domisili', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->dateTime('rt_date_approved')->nullable();
            $table->integer('rt_user_id')->nullable();
            $table->smallInteger('rt_status')->nullable();
            $table->text('rt_catatan')->nullable();
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
        Schema::dropIfExists('surat_pengantar_domisili');
    }
}
