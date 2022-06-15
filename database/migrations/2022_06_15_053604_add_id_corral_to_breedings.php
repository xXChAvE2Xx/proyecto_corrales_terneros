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
        Schema::table('breedings', function (Blueprint $table) {
            $table->bigInteger('id_corral')->unsigned()->nullable();
            $table->foreign('id_corral')
                  ->references('id')
                  ->on('corrals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('breedings', function (Blueprint $table) {
            //
        });
    }
};
