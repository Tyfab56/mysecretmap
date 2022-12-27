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
        Schema::create('circuit_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('circuit_id');
            $table->integer('rang');
            $table->foreignId('spot_id');
            $table->timestamps();

            $table->foreign('circuit_id')->references('id')->on('circuits');
            $table->foreign('spot_id')->references('id')->on('spots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circuit_detail');
    }
};
