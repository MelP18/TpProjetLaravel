<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    

    public function addCategory(){
        $categories = Category::all();
       
        //dd($categories);
        $user = Auth::user();
        
        return view('addCourse', compact('categories','user'));
    }

    public function addCategorySend(Request $request){
        $data = $request->all();

        $validation = $request->validate([
            'name_category' => 'required'
        ]);

        $save = Category::create([
            'name_category' => $data['name_category']
        ]);
        
        return redirect()->back()->with('message', 'Categorie ajouté avec succès!');
    }
}
