<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailing_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('interest1')->nullable();
            $table->unsignedInteger('interest2')->nullable();
            $table->unsignedInteger('interest3')->nullable();
            $table->unsignedInteger('interest4')->nullable();
            $table->unsignedInteger('interest5')->nullable();

            $table->foreign('interest1', 'interest1_skill_id')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('interest2', 'interest2_project_skill_id')
                ->references('id')
                ->on('project_skills')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id', 'mail_recipient_user_id')
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
        Schema::dropIfExists('mailing_lists');
    }
}
