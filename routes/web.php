<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'authLogin'])->name('authLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/lupa_password', [AuthController::class, 'forgotpassword'])->name('lupa_password');
Route::post('/lupa_password', [AuthController::class, 'postforgot'])->name('post_lupa_password');
Route::get('/reset/{token}', [AuthController::class, 'reset'])->name('reset_password');
Route::post('reset/{token}', [AuthController::class, 'postreset'])->name('post_reset');

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('admin/list', [AdminController::class, 'list'])->name('admin_list');
    Route::get('admin/list/add', [AdminController::class, 'add'])->name('add_admin');
    Route::post('admin/list/add', [AdminController::class, 'store'])->name('admin.store');
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.student');
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.teacher');
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.parent');
});
