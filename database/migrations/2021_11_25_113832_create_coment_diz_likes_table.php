<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentDizLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coment_diz_likes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coment_id', false, true);
            $table->bigInteger('user_id', false, true);
            $table->bigInteger('post_id', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coment_diz_likes');
    }
}