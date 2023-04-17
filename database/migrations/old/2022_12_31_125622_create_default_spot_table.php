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
        Schema::create('default_spots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spot_id');
            $table->string('pays_id',2);
            $table->timestamps();
            $table->foreign('spot_id')->references('id')->on('spots');
            $table->foreign('pays_id')->references('pays_id')->on('pays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_spots');
    }
};
