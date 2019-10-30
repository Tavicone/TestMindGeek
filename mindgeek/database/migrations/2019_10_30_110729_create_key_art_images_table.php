<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyArtImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_art_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('movie_id');
            $table->string('url');
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->timestamps();
        });

        Schema::table('key_art_images', function (Blueprint $table) {
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
        Schema::dropIfExists('key_art_images');
    }
}
