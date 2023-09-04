<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cour_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_id')->nullable(false)
                ->constrained('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignId('students_id')->nullable(false)
                    ->constrained('students')
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
        Schema::dropIfExists('cour_students');
    }
}
