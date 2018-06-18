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
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('slug', 190)->unique();
            $table->boolean('is_admin')->default(false);
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('city')->nullable();
            $table->unsignedInteger('country')->nullable();
            $table->unsignedInteger('primary_role')->nullable();
            $table->unsignedInteger('secondary_role')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->unsignedInteger('availability')->nullable();
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
            $table->string('_token')->nullable();

            $table->foreign('country', 'user_country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('primary_role', 'primary_role_skill_id')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('secondary_role', 'secondary_role_skill_id')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('availability', 'availability_id')
                ->references('id')
                ->on('availabilities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->softDeletes();
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
