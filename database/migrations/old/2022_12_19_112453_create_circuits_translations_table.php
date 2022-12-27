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
        Schema::create('circuits_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('circuits_id')->unsigned();
            $table->string('locale')->index();
            $table->string('titre', 191)->nullable();;
            $table->text('description')->nullable();;
            $table->timestamps();
            $table->unique(['circuits_id', 'locale']);
            $table->foreign('circuits_id')->references('id')->on('circuits')->onDelete('cascade');
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
        Schema::dropIfExists('circuits_translations');
    }
};
