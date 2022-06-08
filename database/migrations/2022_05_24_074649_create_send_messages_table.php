<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('send_messages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Submit FeedBack', 'Billing Question', 'Request Ride', 'Others']);
            $table->string('Fname');
            $table->string('Lname');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
            $table->string('account')->nullable();
            $table->string('invice')->nullable();
            $table->enum('wheelchair', ['yes', 'no'])->nullable();
            $table->enum('round_trip', ['yes', 'no'])->nullable();
            $table->string('trip_date')->nullable();
            $table->double('start_lat')->nullable();
            $table->double('start_lng')->nullable();
            $table->double('end_lat')->nullable();
            $table->double('end_lng')->nullable();
            $table->double('distance')->nullable();
            $table->string('start_address')->nullable();
            $table->string('end_address')->nullable();
            $table->string('cost')->nullable();
            $table->enum('status_assign', ['yes', 'no'])->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('send_messages');
    }
}
