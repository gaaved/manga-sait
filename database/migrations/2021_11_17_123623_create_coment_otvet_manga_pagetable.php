<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentOtvetMangaPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coment_otvet_manga_pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coment_id', false, true);
            $table->bigInteger('user_id', false, true);
            $table->bigInteger('post_id', false, true);
            $table->string('coment', 255);
            $table->timestamps();
            $table->string('coment_user_id');
            
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
        Schema::dropIfExists('coment_otvet_manga_pages');
    }
}
