<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function showStudentsLists(){
        $studentsLists = Student::all();
        return view('index', compact('studentsLists'));
    }

    
    public function showStudent($id){
        $students = Student::all();
        $data = Student::find($id);
        return view('show', compact('students','data','id'));
    }


    public function deleteStudent($id){
        $data = Student::where('id', $id)->delete();
        return redirect()-> route('studentslists');
    }


    public function studentInfo($id){
        $students = Student::all();
        $data = Student::find($id);
        return view('edit', compact('data','id'));
    }


    public function modifyFormInfo(Request $request, $id){

        $data = $request->all();

        $validation = $request->validate([
            "photo" => 'required', 
            "firstname" => 'required', 
            "surname" => 'required', 
            "birthday" => 'required', 
            "hobby" => 'required', 
            "speciality" => 'required', 
            "competency" => 'required', 
            "biography" => 'required', 
        ]);

        $picture = Storage::disk('local')->put('profil', $request->photo);
        
        Student::where('id', $id)->update([
            "photo" =>$picture,
            "firstname" => $data['firstname'],
            "surname" => $data['surname'],
            "birthday" => $data['birthday'],
            "hobby" => $data['hobby'],
            "speciality" => $data['speciality'],
            "competency" => $data['competency'],
            "biography" => $data['biography'],
        ]);

        return redirect()->route('studentslists')->with('message', 'Information modifiée  avec  succès !');
    }


    public function showForm(){
        return view('show');
    }


    public function addStudent(Request $request){
        $data = $request->all();
        $validation = $request->validate([
            "photo" => 'required', 
            "firstname" => 'required', 
            "surname" => 'required', 
            "birthday" => 'required', 
            "hobby" => 'required', 
            "speciality" => 'required', 
            "competency" => 'required', 
            "biography" => 'required', 
        ]);

        $picture = Storage::disk('local')->put('profil', $request->photo);

        //dd($picture);


        $save = Student::create([
            "photo" => $picture,
            "firstname" => $data['firstname'],
            "surname" => $data['surname'],
            "birthday" => $data['birthday'],
            "hobby" => $data['hobby'],
            "speciality" => $data['speciality'],
            "competency" => $data['competency'],
            "biography" => $data['biography'],
        ]);

        return redirect()->route('studentslists')-> with('message', 'Etudiant ajouté avec  succès !');
    } 
    
}
