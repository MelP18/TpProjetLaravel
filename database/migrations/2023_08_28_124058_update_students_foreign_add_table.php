<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStudentsForeignAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            

            /* $table->string('user_email');
            $table->foreign('user_eamil')
                ->references('email')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade'); */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
