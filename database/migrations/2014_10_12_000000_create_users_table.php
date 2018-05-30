<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

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
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug', 190)->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('city')->nullable();
            $table->unsignedTinyInteger('country')->nullable();
            $table->unsignedTinyInteger('primary_role')->nullable();
            $table->unsignedInteger('secondary_role')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->unsignedTinyInteger('availability')->nullable();
            $table->string('email')->unique();
            $table->string('image_path')->nullable();
            $table->string('password');
            $table->string('email_verification_code')->default(str_random(33).Carbon::now()->format('Y-m-d-m-i-s'));
            $table->timestamp('verification_sent_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('interests')->nullable();
            $table->longText('experience')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('website')->nullable();
            $table->text('instagram')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('_token')->nullable();

            $table->foreign('country', 'country_id')
                ->references('id')
                ->on('country')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('primary_role', 'primary_role_skill_id')
                ->references('id')
                ->on('skill')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('secondary_role', 'secondary_role_skill_id')
                ->references('id')
                ->on('skill')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('availability', 'availability_id')
                ->references('id')
                ->on('availability')
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
        Schema::dropIfExists('users');
    }
}
