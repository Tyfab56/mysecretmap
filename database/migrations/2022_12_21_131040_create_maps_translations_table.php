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
        Schema::create('maps_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('maps_id')->unsigned();
            $table->string('locale')->index();
            $table->string('titre', 191)->nullable();
            $table->timestamps();
            $table->unique(['maps_id', 'locale']);
            $table->foreign('maps_id')->references('id')->on('maps')->onDelete('cascade');
            $table->foreign('locale')->references('idlang')->on('langs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maps_translations');
    }
};
