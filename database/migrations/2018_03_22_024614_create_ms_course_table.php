<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_question', function (Blueprint $table) {
            $table->increments('question_id');
            $table->string('question', 150);
            $table->string('answer_1', 50)->nullable();
            $table->string('answer_2', 50)->nullable();
            $table->string('answer_3', 50)->nullable();
            $table->string('answer_4', 50)->nullable();
            $table->string('image')->nullable();
            $table->integer('correct_answer')->default(1);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('ms_question');
    }
}
