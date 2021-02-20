<?php

use App\Http\Controllers\PracticeBaseController;
use App\Http\Controllers\PracticeUnitController;
use App\Http\Controllers\PracticeDepartmentController;
use App\Http\Controllers\PracticeInstructorController;
use App\Http\Controllers\BaseUnitsController;
use App\Http\Controllers\BaseUnitDepartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User admin to AdminPanel
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
// Roles and practiceBaseUserViews
    Route::get('/role-register','App\Http\Controllers\Admin\DashboardController@registeredUser');
    Route::get('/edit-register-user/{id}', 'App\Http\Controllers\Admin\DashboardController@editRegisterUser');
    Route::post('/update-role-register/{id}', 'App\Http\Controllers\Admin\DashboardController@updateRegisterUser');
    Route::delete('/delete-role-register/{id}', 'App\Http\Controllers\Admin\DashboardController@deleteRegisterUser');

    // Practice Base
    Route::get('/add-practice-base', [PracticeBaseController::class, 'addPracticeBase']);
    Route::post('/create-practice-base', [PracticeBaseController::class, 'createPracticeBase'])->name('practiceBase.create');
    Route::get('/practiceBases', [PracticeBaseController::class, 'getPracticeBases']);
    Route::get('/practiceBases/{id}', [PracticeBaseController::class, 'getPracticeBaseById']);
    Route::get('/delete-practice-base/{id}', [PracticeBaseController::class, 'deletePracticeBase']);
    Route::get('/edit-practice-base/{id}', [PracticeBaseController::class, 'editPracticeBase']);
    Route::post('/update-practice-base', [PracticeBaseController::class, 'updatePracticeBase'])->name('practiceBase.update');

    // Practice Unit
    Route::get('/add-practice-unit', [PracticeUnitController::class, 'addPracticeUnit']);
    Route::post('/create-practice-unit', [PracticeUnitController::class, 'createPracticeUnit'])->name('practiceUnit.create');
    Route::get('/practiceUnits', [PracticeUnitController::class, 'getPracticeUnit']);
    Route::get('/practiceUnits/{id}', [PracticeUnitController::class, 'getPracticeUnitById']);
    Route::get('/delete-practice-unit/{id}', [PracticeUnitController::class, 'deletePracticeUnit']);
    Route::get('/edit-practice-unit/{id}', [PracticeUnitController::class, 'editPracticeUnit']);
    Route::post('/update-practice-unit', [PracticeUnitController::class, 'updatePracticeUnit'])->name('practiceUnit.update');

    // Practice Department

    Route::get('/add-practice-department', [PracticeDepartmentController::class, 'addPracticeDepartment']);
    Route::post('/create-practice-department', [PracticeDepartmentController::class, 'createPracticeDepartment'])->name('practiceDepartment.create');
    Route::get('/practiceDepartments', [PracticeDepartmentController::class, 'getPracticeDepartment']);
    Route::get('/practiceDepartments/{id}', [PracticeDepartmentController::class, 'getPracticeDepartmentById']);
    Route::get('/delete-practice-department/{id}', [PracticeDepartmentController::class, 'deletePracticeDepartment']);
    Route::get('/edit-practice-department/{id}', [PracticeDepartmentController::class, 'editPracticeDepartment']);
    Route::post('/update-practice-department', [PracticeDepartmentController::class, 'updatePracticeDepartment'])->name('practiceDepartment.update');

    // Practice Instructor

    Route::get('/add-practice-instructor', [PracticeInstructorController::class, 'addPracticeInstructor']);
    Route::post('/create-practice-instructor', [PracticeInstructorController::class, 'createPracticeInstructor'])->name('practiceInstructor.create');
    Route::get('/practiceInstructors', [PracticeInstructorController::class, 'getPracticeInstructor']);


    // BaseUnits (mixed table, base and unit)
    Route::get('/add-unit-to-base', 'App\Http\Controllers\BaseUnitsController@dropDownBase');
    Route::post('/create-unit-to-base', [BaseUnitsController::class,'createBaseUnit'])->name('baseUnit.create');
    Route::get('/baseUnits', [BaseUnitsController::class, 'getBaseUnits']);
    Route::get('/baseUnits/{id}', [BaseUnitsController::class, 'getBaseUnitById']);
    Route::get('/delete-unit-to-base/{id}', [BaseUnitsController::class, 'deleteBaseUnits']);
    Route::get('/edit-unit-to-base/{id}', [BaseUnitsController::class, 'editBaseUnits']);
    Route::post('/update-unit-to-base', [BaseUnitsController::class, 'updateBaseUnits'])->name('baseUnits.update');

    // BaseUnitDepartment (mixed table, base and unit and department)
    Route::get('/add-unit-dep-to-base', 'App\Http\Controllers\BaseUnitDepartmentController@addBaseUnitDep');
    Route::post('/create-unit-dep-to-base', [BaseUnitDepartmentController::class,'createBaseUnitDep'])->name('baseUnitDep.create');
    Route::get('/baseUnitsDeps', [BaseUnitDepartmentController::class, 'getBaseUnitsDeps']);
    Route::get('/delete-unit-dep-to-base/{id}', [BaseUnitDepartmentController::class, 'deleteBaseUnitsDeps']);
    Route::get('/edit-unit-dep-to-base/{id}', [BaseUnitDepartmentController::class, 'editBaseUnitsDeps']);
    Route::post('/update-unit-dep-to-base', [BaseUnitDepartmentController::class, 'updateBaseUnitsDeps'])->name('baseUnitDep.update');
});

// Student access
Route::group(['middleware' => ['auth', 'student']], function () {

    Route::get('/home-student', function () {
        return view('student.home-student');
    });
});

// Practice Base Instructor access
Route::group(['middleware' => ['auth', 'practiceBaseInstructor']], function () {

    Route::get('/home-practiceBase-instructor', function () {
        return view('practiceBaseInstructor.home-practiceBase-instructor');
    });
});

// School Instructor access
Route::group(['middleware' => ['auth', 'schoolInstructor']], function () {

    Route::get('/home-school-instructor', function () {
        return view('schoolInstructor.home-school-instructor');
    });
});

// Practice Base access
Route::group(['middleware' => ['auth', 'practiceBase']], function () {

    Route::get('/home-practiceBase', function () {
        return view('practiceBaseUserViews.home-practiceBase');
    });
});

// School access
Route::group(['middleware' => ['auth', 'school']], function () {

    Route::get('/home-school', function () {
        return view('schoolUserViews.home-school');
    });
});





// User
//Route::get('/add-user', [UserController::class, 'addUser']);
//Route::post('/create-user', [UserController::class, 'createUser'])->name('user.create');
