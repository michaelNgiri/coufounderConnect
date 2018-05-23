<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            // $table->string('slug', 190);
            $table->boolean('is_admin')->default(false);
            $table->string('phone')->nullable();
            $table->integer('city')->nullable();
            $table->integer('country')->nullable();
            $table->string('role')->nullable();
            $table->integer('age')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->float('availability')->nullable();
            $table->string('email')->unique();
            $table->string('image_path')->nullable();
            $table->string('password');
            $table->boolean('verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
