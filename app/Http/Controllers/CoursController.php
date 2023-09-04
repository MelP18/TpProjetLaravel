<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    public function addCourseSend(Request $request){
        $data = $request->all();

        $validation = $request->validate([
            'name_course'=> 'required',
            'hourly_weight'=> 'required',
            'coefficient' => 'required',
            'add_by' => 'required',
        ]);

        //dd($data);
        $save = Cours::create([
            'name_course'=> $data['name_course'],
            'hourly_weight'=> $data['hourly_weight'],
            'coefficient' => $data['coefficient'],
            'add_by' => $data['add_by'],
            'category_id' => $data['category_id']
        ]);

        return redirect()->back()->with('message', 'Cours ajouté avec succès!');
    }

    public function courseList(){
        $courses = Cours::all();
        return view('courses',compact('courses'));
    }

    public function courseModify($id){
        //$courses = Cours::all();
        $user = Auth::user();
        $categories = Category::all();
        $course = Cours::find($id);
        return view('modifyCourse', compact('course','id','user','categories'));
    }

    public function courseModifySend(Request $request, $id){
        $data = $request->all();

        $validation = $request->validate([
            'name_course'=> 'required',
            'hourly_weight'=> 'required',
            'coefficient' => 'required',
            'add_by' => 'required',
        ]);

        //dd($data);
        Cours::where('id', $id)->update([
            'name_course'=> $data['name_course'],
            'hourly_weight'=> $data['hourly_weight'],
            'coefficient' => $data['coefficient'],
            'add_by' => $data['add_by'],
            'category_id' => $data['category_id']
        ]);

        return redirect()->back()->with('message', 'Cours modifié avec succès!');
    }

    public function courseDelete( $id){
        $data = Cours::where('id', $id)->delete();
        return  redirect()->back()->with('message', 'Cours supprimé avec succès!');
    }
}
