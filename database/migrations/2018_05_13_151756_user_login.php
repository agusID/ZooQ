<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login', function (Blueprint $table) {
            $table->increments('login_id');
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('email', 100);
            $table->string('password', 100);
            $table->dateTime('last_login');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('ms_user');
            $table->foreign('role_id')->references('role_id')->on('ms_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_login');
    }
}
