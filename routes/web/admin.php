<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [AuthController::class, 'login'])->name("admin.login");

Route::group(['prefix' => 'ad', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::post('/login', [AuthController::class, 'checklogin'])->name('check-login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name("dashboard");
});

Route::group(['prefix' => 'ad', 'as' => 'admin.'], function () {
    Route::get(
        '/categories/check-unique-name', [CategoryController::class, 'checkUniqueNameCategories']
    )->name('categories.check-unique-name');
    Route::get(
        '/categories/check-unique-name-in-edit', [CategoryController::class, 'checkUniqueNameCategoriesEdit']
    )->name('categories.check-unique-name-in-edit');
    Route::resource('categories', CategoryController::class);
});
