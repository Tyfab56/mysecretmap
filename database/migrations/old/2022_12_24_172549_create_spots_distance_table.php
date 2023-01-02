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
        Schema::create('distances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spot_origine');
            $table->foreignId('spot_destination');
            $table->integer('metres');
            $table->integer('temps');
            $table->timestamps();
            $table->foreign('spot_origine')->references('id')->on('spots');
            $table->foreign('spot_destination')->references('id')->on('spots');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distances');
    }
};
