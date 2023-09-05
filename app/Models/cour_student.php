<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cour_student extends Model
{
    use HasFactory;

    protected $guarded = [];
    


    public function studentsLists(){
        return $this->belongsTo(Student::class, 'students_id','id');
    }


    public function coursesLists(){
        return $this->belongsTo(Cours::class, 'courses_id','id');
    }
    

}
