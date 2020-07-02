<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->default(1);
            $table->unsignedInteger('service_id')->nullable();
            $table->string('type_of_payment')->nullable();
            $table->string('address')->nullable();
            $table->string('map')->nullable();
            $table->string('acc_name')->nullable();
            $table->string('acc_number')->nullable();
            $table->string('contact')->nullable();
            $table->string('transaction')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('payments');
    }
}
