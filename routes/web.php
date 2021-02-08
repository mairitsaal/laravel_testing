<?php

use App\Http\Controllers\PracticeBaseController;
use App\Http\Controllers\PracticeUnitController;
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

Route::get('/add-practice-base', [PracticeBaseController::class, 'addPracticeBase']);
Route::post('/create-practice-base', [PracticeBaseController::class, 'createPracticeBase'])->name('practiceBase.create');
Route::get('/practiceBases', [PracticeBaseController::class, 'getPracticeBases']);
Route::get('/practiceBases/{id}', [PracticeBaseController::class, 'getPracticeBaseById']);
Route::get('/delete-practice-base/{id}', [PracticeBaseController::class, 'deletePracticeBase']);
Route::get('/edit-practice-base/{id}', [PracticeBaseController::class, 'editPracticeBase']);
Route::post('/update-practice-base', [PracticeBaseController::class, 'updatePracticeBase'])->name('practiceBase.update');

Route::get('/add-practice-unit', [PracticeUnitController::class, 'addPracticeUnit']);
Route::post('/create-practice-unit', [PracticeUnitController::class, 'createPracticeUnit'])->name('practiceUnit.create');
Route::get('/practiceUnits', [PracticeUnitController::class, 'getPracticeUnit']);
Route::get('/practiceUnits/{id}', [PracticeUnitController::class, 'getPracticeUnitById']);
Route::get('/delete-practice-unit/{id}', [PracticeUnitController::class, 'deletePracticeUnit']);
Route::get('/edit-practice-unit/{id}', [PracticeUnitController::class, 'editPracticeUnit']);
Route::post('/update-practice-unit', [PracticeUnitController::class, 'updatePracticeUnit'])->name('practiceUnit.update');

// User admin to AdminPanel
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

});


