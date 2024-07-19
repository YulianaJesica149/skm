<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RespondentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//home
Route::get('/', [HomeController::class, 'home']);
Route::get('/questionnaire', [HomeController::class, 'index']);
Route::post('/respondent', [HomeController::class, 'store']);
Route::post('/result', [HomeController::class, 'saveAnswers']);

//KUESIONER

// //auth 
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/proses-forgot-password', [LoginController::class, 'proses_forgot_password'])->name('proses-forgot-password');

Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/proses-validasi-forgot-password', [LoginController::class, 'proses_validasi_forgot_password'])->name('proses-validasi-forgot-password');

Route::post('/logout', [LoginController::class, 'logout']);



Route::group(['middleware' => ['auth', 'role:admin|kepala dinas']], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    //SERVICE(JENIS PELAYANAN)
    Route::get('/service', [ServiceController::class, 'index']);
    Route::get('/service-add', [ServiceController::class, 'create'])->middleware('role_or_permission:create_service|admin');
    Route::post('/service', [ServiceController::class, 'store']);
    Route::get('/service-edit/{id}', [ServiceController::class, 'edit'])->middleware('role_or_permission:edit_service|admin');
    Route::post('/service-update/{id}', [ServiceController::class, 'update']);
    Route::delete('/service-destroy/{id}', [ServiceController::class, 'destroy'])->middleware('role_or_permission:delete_service|admin');

    //QUESTION(PERTANYAAN)
    Route::get('/question', [QuestionController::class, 'index']);
    Route::get('/question-add', [QuestionController::class, 'create'])->middleware('role_or_permission:create_question|admin');
    Route::post('/question', [QuestionController::class, 'store']);
    Route::get('/question-edit/{id}', [QuestionController::class, 'edit'])->middleware('role_or_permission:edit_question|admin');
    Route::post('/question-update/{id}', [QuestionController::class, 'update']);
    Route::delete('/question-destroy/{id}', [QuestionController::class, 'destroy'])->middleware('role_or_permission:delete_question|admin');

    //OPTION(PILIHAN)
    Route::get('/option', [OptionController::class, 'index']);
    Route::get('/option-add', [OptionController::class, 'create'])->middleware('role_or_permission:create_option|admin');
    Route::post('/option', [OptionController::class, 'store']);
    Route::get('/option-edit/{id}', [OptionController::class, 'edit'])->middleware('role_or_permission:edit_option|admin');
    Route::post('/option-update/{id}', [OptionController::class, 'update']);
    Route::delete('/option-destroy/{id}', [OptionController::class, 'destroy'])->middleware('role_or_permission:delete_option|admin');

    //RESPONDENT
    Route::get('/respondent', [RespondentController::class, 'index']);
    Route::get('/respondent-export', [RespondentController::class, 'export']);
    Route::get('/respondent-edit/{id}', [RespondentController::class, 'edit'])->middleware('role_or_permission:edit_respondent|admin');
    Route::post('/respondent-update/{id}', [RespondentController::class, 'update'])->middleware('role:admin');
    Route::delete('/respondent-destroy/{id}', [RespondentController::class, 'destroy'])->middleware('role_or_permission:delete_option|admin');

    //RESULT(Laporan)
    Route::get('/result', [ResultController::class, 'index']);
    Route::get('/result-export', [ResultController::class, 'export']);

    //PROFIL 
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil-change-password/{id}', [ProfilController::class, 'edit'])->name('edit.password');
    Route::post('/update-password/{id}', [ProfilController::class, 'update_password'])->name('update.password');
});
