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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Route::group(['middleware' => 'guest'], function () {
    Route::get('admin-login',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/insert',[AdminLoginController::class, 'insert'])->name('insert');
    Route::post('admin/auth',[AdminLoginController::class, 'loginAdmin'])->name('admin.auth');
});
Route::group(['middleware' => 'is.admin','prefix'=>'backend'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout',[AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
