<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsZooQTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_zooq', function (Blueprint $table) {
            $table->increments('zooq_id');
            $table->string('name', 100);
            $table->string('address', 200);
            $table->string('contact', 100);
            $table->string('email', 100);
            $table->string('logo', 150)->default('ZooQ.png');
            $table->boolean('isLogoActive')->default(true);
            $table->boolean('isNameActive')->default(true);
            $table->integer('primary_color')->unsigned()->default('19');
            $table->boolean('text_color')->unsigned()->default(true);
            $table->string('seo_keywords', 200)->default('ZooQ, education, etc')->nullable();
            $table->string('seo_descriptions', 200)->default('-')->nullable();
            $table->string('favicon', 150)->default('ZooQ-favicon.png')->nullable();
            $table->text('about');
            $table->timestamps();
            $table->foreign('primary_color')->references('color_id')->on('ms_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_zooq');
    }
}
