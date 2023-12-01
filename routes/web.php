<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::any("answer",function(){
    return view('answer.answerDesk');
});
//Route::any('questions',function(){
//    return view('questions.questions');
//})->name('questions');
Route::any('start',function(){
    return view('questions.start');
})->name('start');
Route::any('end',function(){
    return view('questions.end');
});
Route::post('submitans',[QuestionController::class,'submitans'])->name('submitans');
Route::resource('questions',\App\Http\Controllers\QuestionController::class);
Route::get('startquiz',[QuestionController::class,'startquiz'])->name('startquiz');
