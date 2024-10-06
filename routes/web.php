<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/quizzes/choose', [QuizController::class, 'choice'])->name('choice');
Route::get('/quizzes/earth-play', [QuizController::class, 'earthPlay'])->name('earth-play');
Route::post('/quizzes/earth-submit', [QuizController::class, 'earthSubmit'])->name('earth-submit');

Route::get('/quizzes/ocean-play/{step}', [QuizController::class, 'oceanPlay'])->name('ocean-play');
Route::post('/quizzes/ocean-submit/{step}', [QuizController::class, 'oceanSubmit'])->name('ocean-submit');
Route::get('/quizzes/ocean-result', [QuizController::class, 'oceanResult'])->name('ocean-result');



