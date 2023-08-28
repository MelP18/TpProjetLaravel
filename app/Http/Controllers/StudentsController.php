<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{

    /*==============> LISTE DES ETUDIANTS <=================*/
    public function showStudentsLists(){
        $studentsLists = Student::all();
        return view('index', compact('studentsLists'));
    }


    /*==============> DETAILS DES INFOS DES ETUDIANTS <=================*/
    public function showStudent($id){
        $students = Student::all();
        $data = Student::find($id);
        return view('show', compact('students','data','id'));
    }


    /*==============> SUPPRIMER UN ETUDIANT <=================*/
    public function deleteStudent($id){
        $data = Student::where('id', $id)->delete();
        return redirect()-> route('studentslists');
    }


    /*==============> MODIFIER LES INFOS D'UN ETUDIANT 
    (Redirection vers un formulaire avec les infos à modifier) <=================*/
    public function studentInfo($id){
        $students = Student::all();
        $data = Student::find($id);
        return view('edit', compact('data','id'));
    }

    public function diseableStatus($id){
        Student::where('id', $id)->update([
             "status"=> false
         ]);

        return redirect()->route('studentslists')->with('message', 'Status désactivé avec  succès !');
    }

    public function activateStatus($id){
        Student::where('id', $id)->update([
             "status"=> true
         ]);

        return redirect()->route('studentslists')->with('message', 'Status activé avec  succès !');
    }
    
    /*==============> VALIDATION DE LA MODIFICATION LES INFOS D'UN ETUDIANT <=================*/
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


    /*==============> VOIR LE FORMULAIRE D'ENREGISTREMENT D'ETUDIANT <=================*/
    public function showForm(){
        return view('show');
    }


    /*==============> AJOUTER UN ETUDIANT <=================*/
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
