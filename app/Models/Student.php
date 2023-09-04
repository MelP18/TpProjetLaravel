<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    //protected $fillable = ['photo','firstname','surname','birthday','hobby','speciality','competency','biography'];
    //protected $table = "students";
    protected $guarded = [];
    use SoftDeletes;

    public function courses() {

        return $this->belongsToMany(Cours::class, 'cour_students');
    }
}
