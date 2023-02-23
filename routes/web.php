<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/redirect',         [UserController::class, 'redirect']);
    Route::get('/dashboard',        [UserController::class, 'index'])->name('user.dashboard');
    
    Route::get('/profile',          [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile-update',  [UserController::class, 'updateProfile'])->name('user.profile.update');
    
    Route::get('/expense',          [WalletController::class, 'userExpense'])->name('user.expense');
    Route::post('/add-expense',     [WalletController::class, 'addExpense'])->name('user.add.expense');
    Route::post('/search-expense',  [WalletController::class, 'expenseSearchByDate'])->name('search.expense.date');
    Route::get('/search-expense-month', [WalletController::class, 'expenseSearchByMonth'])->name('search.expense.month');
    Route::get('/search-expense-year', [WalletController::class, 'expenseSearchByYear'])->name('search.expense.year');
    
    Route::get('/income',           [WalletController::class, 'userIncome'])->name('user.income');
    Route::post('/add-income',      [WalletController::class, 'addIncome'])->name('user.add.income');
    Route::post('/search-income',   [WalletController::class, 'incomeSearchByDate'])->name('search.income.date');
    Route::get('/search-income-month', [WalletController::class, 'incomeSearchByMonth'])->name('search.income.month');
    Route::get('/search-income-year', [WalletController::class, 'incomeSearchByYear'])->name('search.income.year');
    Route::post('/edit-income',     [WalletController::class, 'editIncome'])->name('edit.income');
    Route::post('/delete-income',   [WalletController::class, 'deleteIncome'])->name('delete.income');
}); 

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/admin-dashboard',  [AdminController::class, 'index'])->name('admin.dashboard');
 });