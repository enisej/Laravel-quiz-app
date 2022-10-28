<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\QuizController;
use \App\Http\Controllers\QuestionController;
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

Route::view('/', 'welcome');

Route::resource('quizes', QuizController::class);
Route::resource('questions', QuestionController::class);

