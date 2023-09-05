<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;

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
    /* Route list admin */
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('admin/list', [AdminController::class, 'list'])->name('admin_list');
    Route::get('admin/list/add', [AdminController::class, 'add'])->name('add_admin');
    Route::post('admin/list/add', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/list/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('admin/list/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('admin/list/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    /* End Route list admin */

    /* Route Kelas */
    Route::get('admin/kelas/index', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('admin/kelas/add', [KelasController::class, 'add'])->name('kelas.add');
    Route::post('admin/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('admin/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('admin/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('admin/kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    /* End Route Kelas */
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
