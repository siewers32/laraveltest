<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('movies', MovieController::class);
//Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies-with-ratings', [MovieController::class, 'allWithAvgRating'])->middleware('auth:sanctum', 'abilities:hoppeldepee');
Route::get('/movies-with-all-ratings', [MovieController::class, 'allRatings'])->middleware('auth:sanctum', 'abilities:hoppeldepee');
Route::get('/users', [UserController::class, 'index']);
Route::get('/users-with-movies', [UserController::class, 'withMovies']);
Route::get('/user-with-movies/{id}', [UserController::class, 'byIdwithMovies']);


Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login'])->name('login');
Route::post("/logout",[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::get("/",[HomeController::class,'home'])->name('home');
