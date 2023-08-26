<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) { 
            $table->id();
            $table->string('photo')->nullable(false); 
            $table->string('firstname')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('hobby')->nullable(false);
            $table->string('speciality')->nullable(false);
            $table->string('competency')->nullable(false);
            $table->longText('biography')->nullable(false);
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
        Schema::dropIfExists('students');
    }
}
