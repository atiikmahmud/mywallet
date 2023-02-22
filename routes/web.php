<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/redirect',         [UserController::class, 'redirect']);
    Route::get('/dashboard',        [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/income',           [UserController::class, 'userIncome'])->name('user.income');
    Route::post('/add-income',      [UserController::class, 'addIncome'])->name('user.add.income');
    Route::get('/expense',          [UserController::class, 'userExpense'])->name('user.expense');
    Route::post('/add-expense',     [UserController::class, 'addExpense'])->name('user.add.expense');
    Route::get('/profile',          [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile-update',  [UserController::class, 'updateProfile'])->name('user.profile.update');
}); 

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/admin-dashboard',  [AdminController::class, 'index'])->name('admin.dashboard');
 });