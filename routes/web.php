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







// Admin Panel

Route::prefix(env('ADMIN_NAME'))->group(function () {
    Route::get('/login',                    [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/auth',            [AdminLoginController::class, 'login'])->name('admin.auth');


    Route::group(['middleware' => ['is.admin']], function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout',[AdminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminController::class, 'aaa'])->name('admin.main');
        Route::get('/profile',                  [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/update',          [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
        Route::get('/password',                 [AdminController::class, 'password'])->name('admin.password');
        Route::post('/password/update',         [AdminController::class, 'passwordUpdate'])->name('admin.password.update');

    });

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
