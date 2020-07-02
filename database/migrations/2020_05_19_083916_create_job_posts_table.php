<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('service_id');
            $table->string('job_title')->nullable();
            $table->string('job_classification')->nullable();
            $table->string('job_industry')->nullable();
            $table->string('job_type')->nullable();
            $table->string('location')->nullable();
            $table->string('salary')->nullable();
            $table->string('number_of_hiring');
            $table->string('qualification');
            $table->string('experience_level');
            $table->string('language')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('requirement')->nullable();
            $table->longtext('condition')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('closing_date')->nullable();
            $table->string('job_priority')->nullable();
            $table->string('status');
            $table->integer('save')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
