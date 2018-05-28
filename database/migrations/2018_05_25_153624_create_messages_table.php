<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('recipient_id');
            $table->text('title');
            $table->longText('message_body');
            $table->boolean('has_attachment')->default(false);
            $table->boolean('sent')->default(false);
            $table->boolean('received')->default(false);
            $table->boolean('read')->default(false);
//            $table->boolean('scheduled')->default(false);
//            $table->timestamp('schedule_time')->default(\Carbon\Carbon::now());
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('sender_id', 'sender_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('recipient_id', 'recipient_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
