<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/quizzes/index/{step}/{category_id}', [QuizController::class, 'index'])->name('index');
Route::post('/quizzes/submit/{step}/{category_id}', [QuizController::class, 'submit'])->name('submit');
Route::get('/quizzes/add', [QuizController::class, 'add'])->name('add');
Route::get('/quizzes/result/{category_id}', [QuizController::class, 'result'])->name('result');
Route::get('/quizzes/choice', [QuizController::class, 'choices'])->name('choices');

Route::get('/quizzes/choose', [QuizController::class, 'choice'])->name('choice');





Route::post('/quizzes/create', [QuizController::class, 'createQuiz'])->name('create');
