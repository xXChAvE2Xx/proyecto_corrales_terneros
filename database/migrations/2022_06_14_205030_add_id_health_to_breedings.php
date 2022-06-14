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
        Schema::table('breeding', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->foreign('id_health')
                  ->references('id')
                  ->on('healths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('breeding', function (Blueprint $table) {
            //
        });
    }
};
