<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->longText('thread');
            $table->string('slug', 190)->unique();
            $table->string('tags')->nullable();
            $table->unsignedInteger('thread_owner');
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamp('revoked_at')->nullable();

            $table->foreign('category_id', 'discussion_category_id')
                ->references('id')
                ->on('discussion_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('thread_owner', 'thread_owner_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('discussions');
    }
}
