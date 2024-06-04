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
use App\Models\Question;

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
Route::get('/kuesioner', [HomeController::class, 'index']);
Route::post('/respondent', [HomeController::class, 'store']);
//KUESIONER
Route::get('/kuesioner-add', [HomeController::class, 'create']);


// Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan');
// Route::get('/layanan/{service}/questions', [HomeController::class, 'layanan'])->name('layanan');
// Route::get('/kuesioner/{service:questions}', [HomeController::class, 'kuesioner'])->name('kuesioner');
// Route::get('/kuesioner/{{ $service->questions }}', function (Question $question) {
//     return view('kuesioner');
// });
// Route::get('/kuesioner', [HomeController::class, 'services'])->name('services');
// Route::post('/kuesioner', [HomeController::class, 'kuesioner_act'])->name('kuesioner-act');
// Route::get('/tampil', [HomeController::class, 'tampil'])->name('tampil');
// Route::post('/api/questions', [HomeController::class, 'questions'])->name('questions');
// Route::post('/api/options', [HomeController::class, 'options'])->name('options');
// });

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
    Route::get('/respondent-edit/{id}', [RespondentController::class, 'edit'])->middleware('role_or_permission:edit_respondent|admin');
    Route::post('/respondent-update/{id}', [RespondentController::class, 'update'])->middleware('role:admin');
    Route::delete('/respondent-destroy/{id}', [RespondentController::class, 'destroy'])->middleware('role_or_permission:delete_option|admin');

    //RESULT(Laporan)
    Route::get('/result', [ResultController::class, 'index']);

    //PROFIL 
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');

    // Route::get('/profil-edit/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    // // Route::post('/profil-change-password/{id}', [ProfilController::class, 'profil_change_password'])->name('profil-change-password');
    // Route::post('/update-password', [ProfilController::class, 'update_password'])->name('update.password');
});
