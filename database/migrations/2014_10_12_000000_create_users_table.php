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
            $table->bigIncrements('id');
            $table->string('verification_code', 6)->nullable();
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->rememberToken();
            $table->timestamps();
            $table->string('token', 191)->nullable();

            // $table->bigIncrements('id');
            // $table->string('verification_code', 6);
            // $table->string('name', 191);
            // $table->string('email', 191)->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password', 191);
            // $table->tinyInteger('status', 4);
            // $table->rememberToken();
            // $table->timestamps();
            // $table->string('token', 191);
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
