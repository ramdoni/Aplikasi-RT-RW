<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPerumahan2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perumahan', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('rt_id')->nullable();
            $table->integer('rw_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perumahan', function (Blueprint $table) {
            //
        });
    }
}
