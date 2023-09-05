<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cour_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_id')->nullable(false)
                ->constrained('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignId('teachers_id')->nullable(false)
                    ->constrained('teachers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('cour_teachers');
    }
}
