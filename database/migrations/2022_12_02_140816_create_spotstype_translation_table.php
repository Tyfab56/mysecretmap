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
        Schema::create('spot_type_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spot_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');

            $table->unique(['spot_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spot_type_translations');
    }
};
