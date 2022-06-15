<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('healths', function (Blueprint $table) {
            $table->bigInteger('id_breedings')->unsigned()->nullable();
            $table->foreign('id_breedings')
                  ->references('id')
                  ->on('breedings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('healths', function (Blueprint $table) {
            //
        });
    }
};
