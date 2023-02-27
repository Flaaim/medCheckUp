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
        Schema::create('direction_psychofactor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('direction_id')->unsigned();
            $table->bigInteger('psychofactor_id')->unsigned();

            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');
            $table->foreign('psychofactor_id')->references('id')->on('psychofactors')->onDelete('cascade');

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
        Schema::dropIfExists('direction_phycho_factor');
    }
};
