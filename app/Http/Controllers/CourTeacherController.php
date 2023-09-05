<?php

namespace App\Http\Controllers;

use App\Models\CourTeacher;
use Illuminate\Http\Request;

class CourTeacherController extends Controller
{
    public function teacherListAllocationSend(Request $request)  {
        $validation = $request->validate([
            'teachers_id'=> 'required',
            'courses_id'=> 'required|array',
        ]);

      
        //dd( $request->all());
        foreach( $request->courses_id as $course){
            $studentCourse = CourTeacher::where([
                ['teachers_id',$request->teachers_id],
                ['courses_id',$course]
            ])->first();
            if(!$studentCourse){
                CourTeacher::create([
                    'teachers_id' => $request->teachers_id,
                    'courses_id' => $course,
                ]);
            }
           
        }
        return redirect()->back()->with('message', 'Attribution effectuée avec succès!');
    }

    
}
