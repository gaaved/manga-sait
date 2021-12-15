<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComentUserIdToComentOtvetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coment_otvets', function (Blueprint $table) {
             $table->string('coment_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coment_otvets', function (Blueprint $table) {
            $table->dropColumn('coment_user_id');
        });
    }
}
