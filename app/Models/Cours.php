<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Cours extends Model
{
    //use HasFactory;
    protected $fillable = ['id','name_course','hourly_weight','coefficient','add_by','category_id'];
    protected $table = 'courses';


    public function category() 
    {
      return  $this->belongsTo(Category::class);
    }
/* 
    public function  students()  {

        return $this->belongsToMany(Student::class);  
    } */

   

    public function StudentsCourses() {

        return $this->hasManyThrough(Student::class, cour_student::class, 'students_id','id','id','courses_id' );
    }

}
