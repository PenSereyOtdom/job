<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('school_name')->nullable();
            $table->string('edu_start_date')->nullable();
            $table->string('edu_end_date')->nullable();
            $table->string('major')->nullable();
            $table->longText('edu_detail')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('cvs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
