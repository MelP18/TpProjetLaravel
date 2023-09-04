<?php

namespace App\Http\Controllers;

use App\Models\cour_student;
use App\Models\Cours;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\attach;

class Cour_StudentController extends Controller
{
    public function Cour_StudentList(){
      
        //$user = Auth::user();
        //$courses = Cours::all();
        $students = Student::with('studentsAllocation')->get();
        $cour = $students[0]->name_course;
        $courses = Cours::with('StudentsCourses')->get();
        //liste des etudiants
        //$students = students_name($user);
        //$studentsAllocation = $students;
    

        //dd($courses);

        //$courseStudents =Cours::all();
        
        //dd($courses);
        //$allocations = cour_student::all()->groupBy('students_id');
        //dd($allocations);
        //$students = Student::all();

        return view('allocationCourStudent', compact('students','courses'/* 'allocations' */));
    }

    
    public function Cour_StudentSet(Request $request){

        $validation = $request->validate([
            'students_id'=> 'required',
            'courses_id'=> 'required|array',
        ]);

      
        
        foreach( $request->courses_id as $course){
            $studentCourse = cour_student::where([
                ['students_id',$request->students_id],
                ['courses_id',$course]
            ])->first();
            if(!$studentCourse){
                cour_student::create([
                    'students_id' => $request->students_id,
                    'courses_id' => $course,
                ]);
            }
           
        }
        return redirect()->back()->with('message', 'Attribution effectuée avec succès!');
    }


    public function Cour_StudentModify($id){
        $Cour_Students = Cour_Student::find($id);
        $id = $Cour_Students['id'];
        //dd($id);
        return redirect()->route('listCour_Student',compact('Cour_Students','id'));
    }

    public function Cour_StudentModifySend(Request $request, $id){
        $data = $request->all();

        $validation = $request->validate([
            'student'=> 'required',
            'course'=> 'required|array',
        ]);

        //dd($data);
        Cour_Student::where('id', $id)->update([
           'student' => $request->student,
           'course' => json_encode($request->course),
        ]);

        return redirect()->back()->with('message', 'Attribution modifiée avec succès!');
    }


    /* public function addTeacher() {
        return view('teacherForm');
    }

    public function  teacherList() {
        return view('teacher');
    } */
    
   
}
