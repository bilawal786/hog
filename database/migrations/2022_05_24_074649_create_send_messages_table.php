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
            $table->string('ridePerson')->nullable();
            $table->string('else_first_name')->nullable();
            $table->string('else_last_name')->nullable();
            $table->string('familycaregive')->nullable();
            $table->string('num_family_member')->nullable();
            $table->string('pertaining')->nullable();
            $table->string('appt_length')->nullable();
            $table->string('card_on_file')->nullable();
            $table->string('relative')->nullable();
            $table->string('relative_no')->nullable();
            $table->string('facility')->nullable();
            $table->integer('waiting')->nullable();
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
            $table->string('start_city')->nullable();
            $table->string('start_country')->nullable();
            $table->string('end_address')->nullable();
            $table->string('end_city')->nullable();
            $table->string('end_country')->nullable();
            $table->string('cost')->nullable();
            $table->enum('status_assign', ['yes', 'no'])->nullable();
            $table->enum('payment', ['no', 'yes'])->nullable();
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
