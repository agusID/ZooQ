<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->integer('position_id')->unsigned();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('gender', 6);
            $table->string('phone', 20);
            $table->string('address', 200);
            $table->string('profile_picture', 150)->default('default-avatar.png');
            $table->string('profile_cover', 150)->default('default-cover.jpg')->nullable();
            $table->text('description')->nullable();;
            $table->foreign('position_id')->references('position_id')->on('ms_user_position');
            $table->timestamps();
        });
    }

    /**user
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_user');
    }
}
