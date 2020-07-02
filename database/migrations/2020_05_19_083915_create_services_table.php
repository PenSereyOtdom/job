<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->default(1);
            $table->unsignedInteger('companies_id')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('type')->nullable();
            $table->string('number_of_post')->nullable();
            $table->string('valid_days')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
