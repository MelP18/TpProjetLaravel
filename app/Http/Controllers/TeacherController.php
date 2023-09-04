<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
   
    public function addTeacher() {
        return view('teacherForm');
    }



    public function  teacherList() {
        $user = Auth::user();
      
        $teachers = $user->teachers;

        //dd($teachers);
    
        return view('teacher',compact('teachers'));
    }

    public function teacherListSend(Request $request){
        $data = $request->all();

        $validate = $request->validate([

            'surname'=> 'required',
            'firstname'=>'required',
            'phone'=>'required',
            'address'=> 'required'
        ]);
        
        //dd($data);

        $save = Teacher::create([
            'surname'=> $data['surname'],
            'firstname'=> $data['firstname'],
            'phone'=> $data['phone'],
            'address'=> $data['address'],
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('listTeacher')->with('message', 'Ensiegnant ajouté avec succès!');
    }

    public function teacherListAllocation() {
        return view('allocationCourTeacher');
    }
   


}
