<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->default(1);
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number')->unique();
            $table->boolean('isVerified')->default(false);
            $table->string('user_profile')->nullable();
            $table->string('password');
            $table->string('summary')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
