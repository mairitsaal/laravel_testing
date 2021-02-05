<?php

use App\Http\Controllers\PracticeBaseController;
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

