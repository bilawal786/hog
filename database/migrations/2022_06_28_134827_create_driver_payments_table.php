<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->string('payment');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_payments');
    }
}
