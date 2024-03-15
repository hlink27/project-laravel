<?php

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScoreController;

//Movies
Route::get('/', [MovieController::class, 'index']);

Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth');
Route::post('/movie', [MovieController::class, 'store']);

Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->middleware('auth');
Route::put('/movies/{movie}', [MovieController::class, 'update']);

Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->middleware('auth');

//User rates movie
Route::post('/score', [ScoreController::class, 'store']);

//User signup
Route::get('/signup', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

//User login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate']);

//Logout
Route::post('/logout', [UserController::class, 'logout']);

//This route needs to be at the bottom
Route::get('/movie/{movie}', [MovieController::class, 'show']);
