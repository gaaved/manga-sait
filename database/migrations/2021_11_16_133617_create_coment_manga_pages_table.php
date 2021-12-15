<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentMangaPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coment_manga_pages', function (Blueprint $table) {
             $table->id();
            $table->bigInteger('user_id', false, true);
            $table->bigInteger('post_id', false, true);
            $table->string('glava', 255);
            $table->bigInteger('page', false, true);
            $table->string('coment', 255);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coment_manga_pages');
    }
}
