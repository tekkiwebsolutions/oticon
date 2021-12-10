<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    Route::get('/about_hearing/{ageCat}', [App\Http\Controllers\HomeController::class, 'aboutHearing'])->name('aboutHearing');

    Route::get('/about_hearing_brain/{ageCat}', [App\Http\Controllers\HomeController::class, 'aboutHearingBrain'])->name('aboutHearingBrain');

    Route::get('/about_hearing_ear/{ageCat}', [App\Http\Controllers\HomeController::class, 'aboutHearingEar'])->name('aboutHearingEar');

    Route::get('/your_hearing', [App\Http\Controllers\HomeController::class, 'yourHearing'])->name('yourHearing');

    Route::get('/your_hearing/{ageCat}', [App\Http\Controllers\HomeController::class, 'yourHearingCat'])->name('yourHearingCat');
    
    Route::get('/introduction', [App\Http\Controllers\HomeController::class, 'introduction'])->name('introduction');
    Route::get('/introduction/{ageCat}', [App\Http\Controllers\HomeController::class, 'introductionCat'])->name('introductionCat');

    Route::get('/situations/{ageCat}', [App\Http\Controllers\HomeController::class, 'situations'])->name('situations');
    Route::get('/your_solution', [App\Http\Controllers\HomeController::class, 'yourSolution'])->name('yourSolution');

    Route::get('/your_solution/{ageCat}', [App\Http\Controllers\HomeController::class, 'yourSolutionCat'])->name('yourSolutionCat');

    Route::get('/styles/{ageCat}', [App\Http\Controllers\HomeController::class, 'styles'])->name('styles');
    Route::get('/resources/{ageCat}/{id}', [App\Http\Controllers\HomeController::class, 'resources'])->name('resources');
    
    Route::get('/reports/{ageCat}', [App\Http\Controllers\HomeController::class, 'reports'])->name('reports');

    Route::get('/technology_history/{ageCat}', [App\Http\Controllers\HomeController::class, 'technologyHistory'])->name('technologyHistory');
    Route::get('/today_technology/{ageCat}', [App\Http\Controllers\HomeController::class, 'todayTechnology'])->name('todayTechnology');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/binaural_benifits/{ageCat}', [App\Http\Controllers\HomeController::class, 'binaural_benifits'])->name('binaural_benifits');
    Route::get('/myaccounts_reports', [App\Http\Controllers\HomeController::class, 'myaccounts_reports'])->name('myaccounts_reports');
    Route::get('/myaccount_agendas', [App\Http\Controllers\HomeController::class, 'myaccount_agendas'])->name('myaccount_agendas');

    Route::get('/myaccount_agendas_create', [App\Http\Controllers\HomeController::class, 'myaccount_agendas_create'])->name('myaccount_agendas_create');

    Route::get('/myaccount_agendas_edit/{id}', [App\Http\Controllers\HomeController::class, 'myaccount_agendas_edit'])->name('myaccount_agendas_edit');

    Route::post('/save_agendas', [App\Http\Controllers\HomeController::class, 'save_agendas'])->name('save_agendas');

    Route::post('/save_questionnaires', [App\Http\Controllers\HomeController::class, 'save_questionnaires'])->name('save_questionnaires');

    Route::get('/delete_agendas/{id}', [App\Http\Controllers\HomeController::class, 'delete_agendas'])->name('delete_agendas');

    Route::get('/myaccount_media', [App\Http\Controllers\HomeController::class, 'myaccount_media'])->name('myaccount_media');
    Route::get('/myaccount', [App\Http\Controllers\HomeController::class, 'myaccount'])->name('myaccount');
    Route::get('/product_categories/{ageCat}', [App\Http\Controllers\HomeController::class, 'product_categories'])->name('product_categories');
    Route::get('/product_listing/{ageCat}', [App\Http\Controllers\HomeController::class, 'product_listing'])->name('product_listing');
});

Auth::routes(['verify' => true]);

Route::post('/unique_email', [App\Http\Controllers\UserController::class, 'unique_email'])->name('unique_email');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

 
Route::post('/adminforgot', [App\Http\Controllers\UserController::class, 'adminforgot'])->name('adminforgot');

Route::get('sessiondata', [App\Http\Controllers\HomeController::class, 'getSessionData'])->name('getSessionData');

Route::get('ageGroupList', [App\Http\Controllers\CommonController::class, 'ageGroupList'])->name('ageGroupList');

Route::post('getSectionDetail', [App\Http\Controllers\CommonController::class, 'getSectionDetail'])->name('getSectionDetail');

Route::post('getSubsectionDetail', [App\Http\Controllers\CommonController::class, 'getSubsectionDetail'])->name('getSubsectionDetail');

Route::get('/about_us', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about_us');

Route::get('/policy', [App\Http\Controllers\HomeController::class, 'policy'])->name('policy');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/term', [App\Http\Controllers\HomeController::class, 'term'])->name('term');

Route::get('pagination', [App\Http\Controllers\CommonController::class, 'pagination'])->name('pagination');

Route::get('generatepdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);

 
