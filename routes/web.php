<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Auth\AdminLoginController;

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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Route::group(['middleware' => 'guest'], function () {
    Route::get('admin-login',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/insert',[AdminLoginController::class, 'insert'])->name('insert');
    Route::post('admin/auth',[AdminLoginController::class, 'loginAdmin'])->name('admin.auth');
});
Route::group(['middleware' => 'is.admin','prefix'=>'backend'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout',[AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile-form', [AdminController::class, 'profileForm'])->name('admin.profile.form');
    Route::get('/reset-password', [AdminController::class, 'resetPassword'])->name('admin.reset.password');
    Route::post('/reset-password-form', [AdminController::class, 'resetPasswordForm'])->name('admin.reset.password.form');

});

Route::get('/clear', function() {

    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('clear-compiled');
    return 'DONE';
});
