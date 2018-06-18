<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('title');
            $table->longText('slug', 255);
            $table->text('short_description');
            $table->longText('details')->nullable();
            $table->unsignedInteger('progress');
            $table->boolean('need_cofounder')->default(true);
            $table->text('tags')->nullable();
            $table->timestamp('banned_at')->nullable();


            $table->foreign('user_id', 'idea_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('progress', 'progress_id')
                ->references('id')
                ->on('progresses')
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
        Schema::dropIfExists('ideas');
    }
}
