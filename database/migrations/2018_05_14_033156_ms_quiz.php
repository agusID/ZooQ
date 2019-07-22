<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MsQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_quiz', function (Blueprint $table) {
            $table->increments('quiz_id');
            $table->integer('user_id')->unsigned();
            $table->integer('score')->default(0)->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('ms_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_quiz');
    }
}
