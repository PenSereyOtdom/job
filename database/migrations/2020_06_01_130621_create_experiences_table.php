<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('exp_workplace_name')->nullable();
            $table->string('exp_title')->nullable();
            $table->string('exp_start_date')->nullable();
            $table->string('exp_end_date')->nullable();
            $table->longText('exp_detail')->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
