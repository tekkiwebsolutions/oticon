<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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


// Route::get('/validate_account/{email}', function ($email) {
//     DB::table('users')
//         ->where('email', $email)
//         ->update(array('status' => '1'));

//     return $email." verified login Now.";
// });



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['verified']], function() {
    Route::get('/age_group', [App\Http\Controllers\HomeController::class, 'ageGroup'])->name('ageGroup');
    Route::get('/about_hearing', [App\Http\Controllers\HomeController::class, 'aboutHearing'])->name('aboutHearing');
    Route::get('/your_hearing', [App\Http\Controllers\HomeController::class, 'yourHearing'])->name('yourHearing');
    
    Route::get('/introduction', [App\Http\Controllers\HomeController::class, 'introduction'])->name('introduction');
    Route::get('/situations', [App\Http\Controllers\HomeController::class, 'situations'])->name('situations');
    Route::get('/your_solution', [App\Http\Controllers\HomeController::class, 'yourSolution'])->name('yourSolution');
    Route::get('/styles', [App\Http\Controllers\HomeController::class, 'styles'])->name('styles');
    Route::get('/resources', [App\Http\Controllers\HomeController::class, 'resources'])->name('resources');
    
    Route::get('/reports', [App\Http\Controllers\HomeController::class, 'reports'])->name('reports');
});

Auth::routes(['verify' => true]);

Route::post('/unique_email', [App\Http\Controllers\UserController::class, 'unique_email'])->name('unique_email');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
