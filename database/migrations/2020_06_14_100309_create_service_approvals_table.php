<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->default(1);
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('payment_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->string('approve')->nullable();
            $table->string('transaction_aba')->nullable();
            $table->string('transaction_wing')->nullable();
            $table->integer('post_number')->nullable();
            $table->integer('value_data')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
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
        Schema::dropIfExists('service_approvals');
    }
}
