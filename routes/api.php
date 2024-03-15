<?php

use App\Http\Controllers\ApiController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/movies', [ApiController::class, 'getAllMovies']);
Route::get('/movies/{id}', [ApiController::class, 'getMovie']);
Route::post('/movies', [ApiController::class, 'createMovie']);
Route::put('/movies/{id}', [ApiController::class, 'updateMovie']);
Route::delete('/movies/{id}', [ApiController::class, 'deleteMovie']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
