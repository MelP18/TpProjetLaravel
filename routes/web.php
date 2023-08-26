<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */



/* Route de la page d'accueil(liste des etudiants) */
Route::get('/', [StudentsController::class, 'showStudentsLists'])->name('studentslists');



/* Route de la page d'accueil(liste des etudiants)après suppression */
Route::get('/new-students-lists/{id}', [StudentsController::class, 'deleteStudent'])->name('newstudentslists');


/* Route de la page détails (détails des etudiants) */
Route::get('/student/{id}', [StudentsController::class, 'showStudent'] )->name("student"); 



/* Route de la page détails (le formulaire d'ajout des étudiant) */
Route::get('/showForm', [StudentsController::class, 'showForm'] )->name("formStudent");


/* Route de vérification et l'ajout des étudiants (Ajout dans la base de donnnées) */
Route::post('/add-sutdent-info/addStudent', [StudentsController::class, 'addStudent'] )->name("addStudentInfo");


/* Route de la page détails (le formulaire de modification  des informations d'un étudiant) */
Route::get('/modifyForm/{id}', [StudentsController::class, 'studentInfo'] )->name("modifyStudentForm");


Route::post('/Form-info/{id}', [StudentsController::class, 'modifyFormInfo'] )->name("modifyFormInfos");



/* Route::get('/show', function () {
    return view('student');
})->name("show");  */ 