<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_images', function (Blueprint $table) {
            $table->string('movie_id');
            $table->string('url');
            $table->string('height');
            $table->string('width');
            $table->timestamps();
        });

        Schema::table('movie_cast', function (Blueprint $table) {
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_images');
    }
}
