<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/quizzes/choose', [QuizController::class, 'choice'])->name('choice');
