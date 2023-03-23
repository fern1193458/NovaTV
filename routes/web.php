<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjemploController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

// Route::get('/test', function () {
//     $day = 'Saturday';
//     return view('test')->with('day',$day);
// });

// Route::get('/index', [EjemploController::class, 'index']);
// Route::get('/users/{id}', [EjemploController::class, 'getUser']);

Route::resources([
    'users' => UserController::class,
    'categories' => CategoryController::class,
    'movies' => MovieController::class
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Filter
Route::post('category/filter', [App\Http\Controllers\HomeController::class, 'filter']);
