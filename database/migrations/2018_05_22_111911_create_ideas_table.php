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
            $table->text('short_description');
            $table->longText('details');
            $table->boolean('conception')->default(true);
            $table->boolean('incubation')->default(false);
            $table->boolean('in_development')->default(false);
            $table->boolean('completed')->default(false);
            $table->boolean('need_cofounder')->default(true);
            $table->integer('required_skill')->nullable();
            $table->text('tags');
            $table->timestamps();

            $table->foreign('user_id', 'ideas_user_id')
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
        Schema::dropIfExists('ideas');
    }
}
