<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::post('/validate_email', [App\Http\Controllers\UserController::class, 'validate_email'])->name('validate_email');


Route::get('/age_group', [App\Http\Controllers\HomeController::class, 'ageGroup'])->name('ageGroup');
Route::get('/about_hearing', [App\Http\Controllers\HomeController::class, 'aboutHearing'])->name('aboutHearing');
Route::get('/your_hearing', [App\Http\Controllers\HomeController::class, 'yourHearing'])->name('yourHearing');

Route::get('/introduction', [App\Http\Controllers\HomeController::class, 'introduction'])->name('introduction');
Route::get('/situations', [App\Http\Controllers\HomeController::class, 'situations'])->name('situations');
Route::get('/your_solution', [App\Http\Controllers\HomeController::class, 'yourSolution'])->name('yourSolution');
Route::get('/styles', [App\Http\Controllers\HomeController::class, 'styles'])->name('styles');
Route::get('/resources', [App\Http\Controllers\HomeController::class, 'resources'])->name('resources');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
