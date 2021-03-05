<?php

use App\Http\Controllers\PracticeBaseController;
use App\Http\Controllers\PracticeUnitController;
use App\Http\Controllers\PracticeDepartmentController;
use App\Http\Controllers\PracticeInstructorController;
use App\Http\Controllers\BaseUnitsController;
use App\Http\Controllers\BaseUnitDepartmentController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UnitDepsController;
use App\Http\Controllers\SpecialityCourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DropdownController;
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
    Route::get('/role-register', 'App\Http\Controllers\Admin\DashboardController@registeredUser');
    Route::get('/edit-register-user/{id}', 'App\Http\Controllers\Admin\DashboardController@editRegisterUser');
    //Route::get('/edit-register-user/{id}', 'App\Http\Controllers\Admin\DashboardController@editRegisterUser');
    //Route::post('/edit-register-user/fetch', 'App\Http\Controllers\Admin\DashboardController@fetch')->name('addunitdeptobase4.fetch');

    Route::post('/update-role-register/{id}', 'App\Http\Controllers\Admin\DashboardController@updateRegisterUser');
    Route::delete('/delete-role-register/{id}', 'App\Http\Controllers\Admin\DashboardController@deleteRegisterUser');
    Route::get('/deleteAll-users', [DashboardController::class, 'deleteAllUsers']);

    // Proovimaks dunamic dropdown ajax
    Route::get('/dropdown','App\Http\Controllers\Admin\DashboardController@speciality');
    //Route::get('/dropdown','App\Http\Controllers\Admin\DashboardController@speciality');
    Route::get('/course/{id}','App\Http\Controllers\Admin\DashboardController@course');


    //Route::get('/role-register', 'App\Http\Controllers\Admin\DashboardController@dynamicDropdown');
    //Route::get('/register-user', 'App\Http\Controllers\Auth\RegisterController@dynamicDropdown');
    //Route::post('/register-user/fetch', 'App\Http\Controllers\Auth\RegisterController@fetch')->name('addunitdeptobase3.fetch');

    // Dynamic dropdown for speciality-course
    //Route::get('/register-user', 'App\Http\Controllers\Auth\RegisterController@dynamicDropdownSpeciality');
    //Route::post('/register-user/fetch3', 'App\Http\Controllers\Auth\RegisterController@fetch3')->name('addcoursetospeciality.fetch');


    // Practice Base
    Route::get('/add-practice-base', [PracticeBaseController::class, 'addPracticeBase']);
    Route::post('/create-practice-base', [PracticeBaseController::class, 'createPracticeBase'])->name('practiceBase.create');
    Route::get('/practiceBases', [PracticeBaseController::class, 'getPracticeBases']);
    Route::get('/practiceBases/{id}', [PracticeBaseController::class, 'getPracticeBaseById']);
    Route::get('/delete-practice-base/{id}', [PracticeBaseController::class, 'deletePracticeBase']);
    Route::get('/deleteAll-practice-base', [PracticeBaseController::class, 'deleteAllPracticeBase']);
    Route::get('/edit-practice-base/{id}', [PracticeBaseController::class, 'editPracticeBase']);
    Route::post('/update-practice-base', [PracticeBaseController::class, 'updatePracticeBase'])->name('practiceBase.update');

    // Practice Unit
    Route::get('/add-practice-unit', [PracticeUnitController::class, 'addPracticeUnit']);
    Route::post('/create-practice-unit', [PracticeUnitController::class, 'createPracticeUnit'])->name('practiceUnit.create');
    Route::get('/practiceUnits', [PracticeUnitController::class, 'getPracticeUnit']);
    Route::get('/practiceUnits/{id}', [PracticeUnitController::class, 'getPracticeUnitById']);
    Route::get('/delete-practice-unit/{id}', [PracticeUnitController::class, 'deletePracticeUnit']);
    Route::get('/deleteAll-practice-unit', [PracticeUnitController::class, 'deleteAllPracticeUnit']);
    Route::get('/edit-practice-unit/{id}', [PracticeUnitController::class, 'editPracticeUnit']);
    Route::post('/update-practice-unit', [PracticeUnitController::class, 'updatePracticeUnit'])->name('practiceUnit.update');

    // Practice Department

    Route::get('/add-practice-department', [PracticeDepartmentController::class, 'addPracticeDepartment']);
    Route::post('/create-practice-department', [PracticeDepartmentController::class, 'createPracticeDepartment'])->name('practiceDepartment.create');
    Route::get('/practiceDepartments', [PracticeDepartmentController::class, 'getPracticeDepartment']);
    Route::get('/practiceDepartments/{id}', [PracticeDepartmentController::class, 'getPracticeDepartmentById']);
    Route::get('/delete-practice-department/{id}', [PracticeDepartmentController::class, 'deletePracticeDepartment']);
    Route::get('/deleteAll-practice-department', [PracticeDepartmentController::class, 'deleteAllPracticeDepartment']);
    Route::get('/edit-practice-department/{id}', [PracticeDepartmentController::class, 'editPracticeDepartment']);
    Route::post('/update-practice-department', [PracticeDepartmentController::class, 'updatePracticeDepartment'])->name('practiceDepartment.update');

    // Practice Instructor
    Route::get('/add-practice-instructor', [PracticeInstructorController::class, 'addPracticeInstructor']);
    Route::post('/create-practice-instructor', [PracticeInstructorController::class, 'createPracticeInstructor'])->name('practiceInstructor.create');
    Route::get('/practiceInstructors', [PracticeInstructorController::class, 'getPracticeInstructor']);
    Route::get('/add-practice-instructor', 'App\Http\Controllers\PracticeInstructorController@dynamicDropdown');
    Route::post('/add-practice-instructor/fetch', 'App\Http\Controllers\PracticeInstructorController@fetch')->name('addunitdeptobase2.fetch');


    // BaseUnits (mixed table, base and unit)
    Route::get('/add-unit-to-base', 'App\Http\Controllers\BaseUnitsController@dropDownBase');
    Route::post('/create-unit-to-base', [BaseUnitsController::class,'createBaseUnit'])->name('baseUnit.create');
    Route::get('/baseUnits', [BaseUnitsController::class, 'getBaseUnits']);
    Route::get('/baseUnits/{id}', [BaseUnitsController::class, 'getBaseUnitById']);
    Route::get('/delete-unit-to-base/{id}', [BaseUnitsController::class, 'deleteBaseUnits']);
    Route::get('/edit-unit-to-base/{id}', [BaseUnitsController::class, 'editBaseUnits']);
    Route::post('/update-unit-to-base', [BaseUnitsController::class, 'updateBaseUnits'])->name('baseUnits.update');

    // UnitDeps (mixed table, unit and departments)
    Route::get('/add-dep-to-unit', [UnitDepsController::class, 'addUnitDeps']);
    Route::post('/create-dep-to-unit', [UnitDepsController::class,'createUnitDeps'])->name('unitDeps.create');
    Route::get('/unitDeps', [UnitDepsController::class, 'getUnitDeps']);
    Route::get('/delete-dep-to-unit/{id}', [UnitDepsController::class, 'deleteUnitDeps']);
    Route::get('/edit-dep-to-unit/{id}', [UnitDepsController::class, 'editUnitDeps']);
    Route::post('/update-dep-to-unit', [UnitDepsController::class, 'updateUnitDeps'])->name('unitDep.update');


    // BaseUnitDepartment (mixed table, base and unit and department)
    Route::get('/add-unit-dep-to-base', 'App\Http\Controllers\BaseUnitDepartmentController@addBaseUnitDep');
    //Route::get('/dynamic-dropdown', 'App\Http\Controllers\BaseUnitDepartmentController@dynamicDropdown');
    //Route::post('/dynamic-dropdown/fetch', 'App\Http\Controllers\BaseUnitDepartmentController@fetch')->name('addunitdeptobase.fetch');


    Route::post('/create-unit-dep-to-base', [BaseUnitDepartmentController::class,'createBaseUnitDep'])->name('baseUnitDep.create');
    Route::get('/baseUnitsDeps', [BaseUnitDepartmentController::class, 'getBaseUnitsDeps']);
    Route::get('/delete-unit-dep-to-base/{id}', [BaseUnitDepartmentController::class, 'deleteBaseUnitsDeps']);

    Route::get('/deleteAll-unit-dep-to-base', [BaseUnitDepartmentController::class, 'deleteAllBaseUnitsDeps']);

    Route::get('/edit-unit-dep-to-base/{id}', [BaseUnitDepartmentController::class, 'editBaseUnitsDeps']);
    Route::post('/update-unit-dep-to-base', [BaseUnitDepartmentController::class, 'updateBaseUnitsDeps'])->name('baseUnitDep.update');

    // Specialities
    Route::get('/add-speciality', [SpecialityController::class, 'addSpeciality']);
    Route::post('/create-speciality', [SpecialityController::class,'createSpeciality'])->name('speciality.create');
    Route::get('/specialities', [SpecialityController::class, 'getSpeciality']);
    Route::get('/delete-speciality/{id}', [SpecialityController::class, 'deleteSpeciality']);
    Route::get('/deleteAll-speciality', [SpecialityController::class, 'deleteAllSpeciality']);
    Route::get('/edit-speciality/{id}', [SpecialityController::class, 'editSpeciality']);
    Route::post('/update-speciality', [SpecialityController::class, 'updateSpeciality'])->name('speciality.update');

    // Courses
    Route::get('/add-course', [CourseController::class, 'addCourse']);
    Route::post('/create-course', [CourseController::class,'createCourse'])->name('course.create');
    Route::get('/courses', [CourseController::class, 'getCourse']);
    Route::get('/delete-course/{id}', [CourseController::class, 'deleteCourse']);
    Route::get('/deleteAll-course', [CourseController::class, 'deleteAllCourse']);
    Route::get('/edit-course/{id}', [CourseController::class, 'editCourse']);
    Route::post('/update-course', [CourseController::class, 'updateCourse'])->name('course.update');
    Route::get('/delete-course-to-speciality/{id}', [SpecialityCourseController::class, 'deletespecialityCourse']);
    Route::get('/deleteAll-course-to-speciality', [SpecialityCourseController::class, 'deleteAllSpecialityCourse']);
    Route::get('/edit-course-to-speciality/{id}', [SpecialityCourseController::class, 'editSpecialityCourse']);
    Route::post('/update-course-to-speciality', [SpecialityCourseController::class, 'updateSpecialityCourse'])->name('specialityCourse.update');



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
