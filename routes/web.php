<?php

use App\Http\Controllers\Cour_StudentController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoursController;
use App\Models\Cour_Student;
use App\Models\Cours;
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

/* Route de la page Home(pour inscription) */
Route::get('/', function(){
   return view('home') ;
});


/* Route grouper interdisant l'accès à la page de la liste des etudiants sans connexion */
Route::controller(StudentsController::class)->middleware('auth')->group(function (){

        /* Route de la page d'accueil(liste des etudiants) */
    Route::get('/studentsLists', 'showStudentsLists')->name('studentslists');

    /* Route de la page détails (détails des etudiants) */
    Route::get('/student/{id}','showStudent')->name("student"); 

    /* Route de vérification et l'ajout des étudiants (Ajout dans la base de donnnées) */
    Route::post('/add-sutdent-info/addStudent', 'addStudent')->name("addStudentInfo");

});


Route::controller(StudentsController::class)->prefix('user')->group(function (){

    /* Route de la page détails (le formulaire d'ajout des étudiant) */
    Route::get('/showForm', 'showForm' )->name("formStudent");

    /* Route de vérification de syntax et modification des infos de  l'ajout des étudiants (Modification dans la base de donnée) */
    Route::post('/Form-info/{id}', 'modifyFormInfo' )->name("modifyFormInfos");

    /* Route vers la page de modification  (le formulaire de modification  des informations d'un étudiant) */
    Route::get('/modifyForm/{id}', 'studentInfo' )->name("modifyStudentForm");

    //Désactiver un étudiant
    Route::get('/statusBution/{id}', 'diseableStatus' )->name("diseableStatus");

    //Ativer un étudiant
    Route::get('/statusButton/{id}', 'activateStatus')->name("activateStatus");

    /* Route de la page d'accueil(liste des etudiants)après suppression */
    Route::get('/new-students-lists/{id}',  'deleteStudent')->name('newstudentslists');

});

/* Route de la page d'accueil(liste des etudiants)après suppression */
//Route::get('/new-students-lists/{id}', [StudentsController::class, 'deleteStudent'])->name('newstudentslists');

/* Route de la page détails (le formulaire d'ajout des étudiant) */
//Route::get('/showForm', [StudentsController::class, 'showForm'] )->name("formStudent");

/* Route vers la page de modification  (le formulaire de modification  des informations d'un étudiant) */
//Route::get('/modifyForm/{id}', [StudentsController::class, 'studentInfo'] )->name("modifyStudentForm");

/* Route de vérification et modification des infos de  l'ajout des étudiants (Modification dans la base de donnée) */
//Route::post('/Form-info/{id}', [StudentsController::class, 'modifyFormInfo'] )->name("modifyFormInfos");

//Route::get('/statusBution/{id}', [StudentsController::class, 'diseableStatus'] )->name("diseableStatus");

//Route::get('/statusButton/{id}', [StudentsController::class, 'activateStatus'] )->name("activateStatus");


Route::controller(UserController::class)->prefix('authentification')->group(function(){
    Route::get('/login','userlogin')->name("login");
    Route::post('/login','authentificationLogin')->name("loginAuthentification");
    Route::get('/log-out','userlogout')->name("logOut");
    Route::get('/signup','userSignup')->name("signup");
    Route::post('/register','register')->name("registerUser");
    Route::get('/verify-email/{email}','verify')->name("verifyEmail");
    Route::get('/forgot-password-verify-email','verifyEmailForgotPassword')->name("verifyEmailForgot");
    Route::post('/forgot-password-verify-email-send','verifyEmailForgotPasswordSend')->name("verifyEmailForgotSend");
    Route::get('/modify-password/{email}','modificationPassword')->name('modifyPassword');
    Route::post('/modify-password-send/{email}','modifyPasswordSend')->name('modifyPasswordSend');
    
});


Route::controller(CategoryController::class)->prefix('categories')->group(function(){
    Route::get('/add-category', 'addCategory')->name('category');
    Route::post('/send-category', 'addCategorySend')->name('sendCategory');
});


Route::controller(CoursController::class)->prefix('courses')->group(function(){
    Route::post('/send-course', 'addCourseSend')->name('sendCourse');
    Route::get('/list-course', 'courseList')->name('listCourse');
    Route::get('/modify-course/{id}', 'courseModify')->name('modifyCourse');
    Route::post('/send-modify-course/{id}', 'courseModifySend')->name('sendModifyCourse');
    Route::get('/delete-course/{id}', 'courseDelete')->name('deleteCourse');
});

Route::controller(Cour_StudentController::class)->prefix('attribution')->group(function(){
    
    //Route::post('/send-course', 'addCourseSend')->name('sendCourse');
    Route::get('/Cour_Student', 'Cour_StudentList')->name('listCour_Student');
    Route::post('/set-Cour_Student', 'Cour_StudentSet')->name('setCour_Student');
    Route::get('/modify-Cour_Student/{id}', 'Cour_StudentModify')->name('modifyCour_Student');
    Route::post('/send-modify-Cour_Student/{id}', 'Cour_StudentModifySend')->name('sendModifyCour_Student');
});

/* Route::get('/show', function () {
    return view('student');
})->name("show");  */ 
