<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourTeacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teachersLists(){
        return $this->belongsTo(Teacher::class, 'teachers_id','id');
    }


    public function coursesLists(){
        return $this->belongsTo(Cours::class, 'courses_id','id');
    }
}
