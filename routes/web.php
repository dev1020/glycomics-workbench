<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;

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

// Example Routes
Route::get('/', [FrontendController::class,'home']);
Route::match(['get', 'post'], '/dashboard', function(){
    return view('front.dashboard');
})->middleware('verified');

Route::middleware(['auth'])->group(function () {
    Route::get('molecules/listAssays', [App\Http\Controllers\MoleculeController::class,'getAssayMethods']);
    Route::resource('molecules', App\Http\Controllers\MoleculeController::class, []);
    Route::put('molecules/{molecule}/restore', [App\Http\Controllers\MoleculeController::class, 'restore'])->name('molecules.restore');
    Route::delete('molecules/{molecule}/purge', [App\Http\Controllers\MoleculeController::class, 'purge'])->name('molecules.purge');
    Route::post('molecules/uploadImagesTinymce', [App\Http\Controllers\MoleculeController::class,'uploadImagesTinymce']);
    Route::post('molecules/saveTranscription', [App\Http\Controllers\MoleculeController::class,'saveTranscription']);
    Route::get('molecules/getTranscription/{id}', [App\Http\Controllers\MoleculeController::class,'getTranscription']);
    Route::delete('molecules/deleteTranscription/{id}', [App\Http\Controllers\MoleculeController::class,'deleteTranscription']);
    Route::post('molecules/saveSubstrate', [App\Http\Controllers\MoleculeController::class,'saveSubstrate']);
    Route::get('molecules/getSubstrate/{id}', [App\Http\Controllers\MoleculeController::class,'getSubstrate']);
    Route::delete('molecules/deleteSubstrate/{id}', [App\Http\Controllers\MoleculeController::class,'deleteSubstrate']);
    Route::post('molecules/saveReagent', [App\Http\Controllers\MoleculeController::class,'saveReagent']);
    Route::get('molecules/getReagent/{id}', [App\Http\Controllers\MoleculeController::class,'getReagent']);
    Route::delete('molecules/deleteReagent/{id}', [App\Http\Controllers\MoleculeController::class,'deleteReagent']);
    Route::post('molecules/saveStrain', [App\Http\Controllers\MoleculeController::class,'saveStrain']);
    Route::get('molecules/getStrain/{id}', [App\Http\Controllers\MoleculeController::class,'getStrain']);
    Route::delete('molecules/deleteStrain/{id}', [App\Http\Controllers\MoleculeController::class,'deleteStrain']);
    Route::delete('molecules/deleteImage/{id}', [App\Http\Controllers\MoleculeController::class,'deleteImage']);
    Route::get('molecules/{molecule}/showPdf', [App\Http\Controllers\MoleculeController::class, 'showPdf'])->name('molecules.showPdf');
    //@endsoftdelete
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/login',[FrontendController::class,'showLogin']);
Route::get('/contact',function(){
    return view('front.contact');
});
Route::post('/contact',[FrontendController::class,'contactFrom'])->name('fcontactform');
Route::post('/quickcontact',[FrontendController::class,'quickcontact']);
Route::post('/login',[FrontendController::class,'login'])->name('flogin');
Route::post('/register',[FrontendController::class,'registerForm'])->name('fregister');
Route::match(['get', 'post'],'/verifyemail/{id}/{hash}', [FrontendController::class, 'verifyEmailVerification'])
    ->middleware(['signed']) // <-- don't remove "signed"
    ->name('verification.verify'); // <-- don't change the route name
Route::get('/verify-email', [FrontendController::class, 'showEmailVerification'])
    ->name('verification.notice'); // <-- don't change the route name
Route::post('/verify-email/request', [FrontendController::class, 'requestEmailVerification'])
    ->name('verification.request');

Route::match(['get', 'post'], '/logout', [FrontendController::class,'logout']);
Route::get('/register',function(){
    return view('front.register');
})->name('frontregister');


Route::get('/forget-password', [FrontendController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [FrontendController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [FrontendController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [FrontendController::class, 'submitResetPasswordForm'])->name('reset.password.post');


// ********** Admin Routes *********
Route::prefix('admin')->group(function () {
    Route::get('/', [AuthController::class,'loadLogin']);
    Route::get('/login', [AuthController::class,'loadLogin']);
    Route::get('/otp-verification', [AuthController::class,'otpPage']);
    Route::post('/otp-verification', [AuthController::class,'verifyOtp'])->name('admin-otp');

    Route::post('/login',[AuthController::class,'login'])->name('login');

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('/register',[AuthController::class,'register'])->name('register');
        Route::get('/dashboard', [AuthController::class,'loadDashboard']);
        Route::get('molecules/assay', [App\Http\Controllers\MoleculeController::class,'assayList'])->name('assays.index');
        Route::get('molecules/assay/create', [App\Http\Controllers\MoleculeController::class,'assayCreate'])->name('assays.create');
        Route::post('molecules/assay/store', [App\Http\Controllers\MoleculeController::class,'assayStore'])->name('assays.store');
        Route::get('molecules/assay/{assay}/edit', [App\Http\Controllers\MoleculeController::class,'assayEdit'])->name('assays.edit');
        Route::put('molecules/assay/{assay}/update', [App\Http\Controllers\MoleculeController::class,'assayUpdate'])->name('assays.update');
        Route::delete('molecules/assay/{assay}/delete', [App\Http\Controllers\MoleculeController::class,'assayDestroy'])->name('assays.destroy');
        if(request()->is('*admin*')){
            Route::resource('molecules', App\Http\Controllers\MoleculeController::class, []);
        }
        \San\Crud\Crud::routes();
    });

});


Route::get('{slug}', [FrontendController::class, 'index'])->name('page');
