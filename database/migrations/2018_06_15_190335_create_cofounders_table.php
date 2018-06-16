<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCofoundersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cofounders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cofounded_idea');
            $table->unsignedInteger('role_id');
            $table->longText('other_info');

            $table->foreign('cofounded_idea', 'cofounded_idea_id')
                ->references('id')
                ->on('ideas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id', 'cofounder_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('role_id', 'cofounder_role_skill_id')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade')
                ->onUpate('cascade');

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
        Schema::dropIfExists('cofounders');
    }
}
