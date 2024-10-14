<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/quizzes/choose', [QuizController::class, 'choices'])->name('choices');
Route::get('/quizzes/index/{step}/{category_id}', [QuizController::class, 'index'])->name('index');
Route::post('/quizzes/submit/{step}/{category_id}', [QuizController::class, 'submit'])->name('submit');

Route::get('/quizzes/add', [QuizController::class, 'add'])->name('add');
Route::post('/quizzes/create', [QuizController::class, 'createQuiz'])->name('create');

Route::get('/quizzes/result/{category_id}', [QuizController::class, 'result'])->name('result');

Route::get('/quizzes/leaderboard', [QuizController::class, 'leaderboard'])->name('leaderboard');
Route::get('/quizzes/dashboard', [QuizController::class, 'dashboard'])->name('dashboard');
Route::put('/quizzes/changeRole/{id}', [QuizController::class, 'changeRole'])->name('changeRole');

Route::post('/quizzes/ban/{id}', [QuizController::class, 'ban'])->name('ban');
Route::post('/quizzes/unban/{id}', [QuizController::class, 'unban'])->name('unban');


