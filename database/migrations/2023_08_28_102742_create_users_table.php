<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('avatar')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->string('firstname')->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->text('password')->nullable(false);
            $table->boolean('email_verified')->nullable();
            $table->datetime('email_verified_at')->nullable();
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
