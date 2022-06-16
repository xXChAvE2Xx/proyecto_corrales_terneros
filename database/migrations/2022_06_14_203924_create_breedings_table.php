<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * sick -> 1 = Enfermo
     * sick -> 0 = No enfermo
     * @return void
     */
    public function up()
    {
        Schema::create('breedings', function (Blueprint $table) {
            $table->id();
            $table->float('weight');
            $table->float('cost');
            $table->string('description');
            $table->integer('color_muscle');
            $table->integer('marbling');
            $table->integer('fat_type');
            $table->integer('sick')->unsigned()->nullable()->default(0);
            $table->integer('quarantine')->unsigned()->default(0);
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
        Schema::dropIfExists('breedings');
    }
};
