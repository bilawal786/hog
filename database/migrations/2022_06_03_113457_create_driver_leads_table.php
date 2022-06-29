<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->unsignedBigInteger('ride_id');
            $table->foreign('ride_id')->references('id')->on('send_messages');
            $table->text('notes');
            $table->double('driver_cost');
            $table->string('status');
            $table->enum('assign', ['no', 'yes']);
            $table->enum('process', ['no', 'yes']);
            $table->enum('reject', ['no', 'yes']);
            $table->enum('complete', ['no', 'yes']);
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
        Schema::dropIfExists('driver_leads');
    }
}
