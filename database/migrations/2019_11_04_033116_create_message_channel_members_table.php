<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageChannelMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_channel_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('message_channel_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('message_channel_id')->references('id')->on('message_channels')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_channel_members');
    }
}
