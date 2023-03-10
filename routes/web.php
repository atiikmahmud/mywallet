<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Models\Transection;
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
    Route::post('/edit-expense',     [WalletController::class, 'editExpense'])->name('edit.expense');
    Route::post('/delete-expense',   [WalletController::class, 'deleteExpense'])->name('delete.expense');
    
    Route::get('/income',           [WalletController::class, 'userIncome'])->name('user.income');
    Route::post('/add-income',      [WalletController::class, 'addIncome'])->name('user.add.income');
    Route::post('/search-income',   [WalletController::class, 'incomeSearchByDate'])->name('search.income.date');
    Route::get('/search-income-month', [WalletController::class, 'incomeSearchByMonth'])->name('search.income.month');
    Route::get('/search-income-year', [WalletController::class, 'incomeSearchByYear'])->name('search.income.year');
    Route::post('/edit-income',     [WalletController::class, 'editIncome'])->name('edit.income');
    Route::post('/delete-income',   [WalletController::class, 'deleteIncome'])->name('delete.income');

    Route::get('/loan',             [TransectionController::class, 'loan'])->name('user.loan');
    Route::get('/paid-loan',        [TransectionController::class, 'PaidLoan'])->name('user.paid.loan');
    Route::post('/do-paid-loan',    [TransectionController::class, 'loanAction'])->name('user.do.paid.loan');
    Route::post('/add-loan',        [TransectionController::class, 'addNewLoan'])->name('add.new.loan');
    Route::post('/edit-loan',       [TransectionController::class, 'editLoan'])->name('edit.loan');
    Route::post('/delete-loan',     [TransectionController::class, 'deleteLoan'])->name('delete.loan');

    Route::get('/owed',             [TransectionController::class, 'owed'])->name('user.owed');
    Route::get('/paid-owed',        [TransectionController::class, 'paidOwed'])->name('user.paid.owed');
    Route::post('/do-paid-owed',    [TransectionController::class, 'owedAction'])->name('user.do.paid.owed');
    Route::post('/add-owed',        [TransectionController::class, 'addNewOwed'])->name('add.new.owed');
    Route::post('/edit-owed',       [TransectionController::class, 'editOwed'])->name('edit.owed');
    Route::post('/delete-owed',     [TransectionController::class, 'deleteOwed'])->name('delete.owed');

    Route::get('/pay-plan',         [TransectionController::class, 'payplan'])->name('user.payplan');
    Route::get('/paid-payplan',     [TransectionController::class, 'paidPayPlan'])->name('user.paid.plan');
    Route::post('/do-paid-plan',    [TransectionController::class, 'payAction'])->name('user.do.paid.pay');
    Route::post('/add-payplan',     [TransectionController::class, 'addPayPlan'])->name('add.new.payplan');
    Route::post('/edit-payplan',    [TransectionController::class, 'editPayPlan'])->name('edit-payplan');
    Route::post('/delete-payplan',  [TransectionController::class, 'deletePayPlan'])->name('delete.payplan');

    Route::get('/report',           [ReportController::class, 'index'])->name('user.report');
    Route::get('/monthly-income',   [ReportController::class, 'monthlyIncome'])->name('report.month.income');
    Route::get('/monthly-income-report', [ReportController::class, 'monthlyIncomeReport']);
    Route::get('/monthly-income-pdf', [ReportController::class, 'monthlyIncomePDF'])->name('monthly.income.report.pdf');

    Route::get('/monthly-expense',   [ReportController::class, 'monthlyExpense'])->name('report.month.expense');
    Route::get('/monthly-expense-report', [ReportController::class, 'monthlyExpenseReport']);
    Route::get('/monthly-expense-pdf', [ReportController::class, 'monthlyExpensePDF'])->name('monthly.expense.report.pdf');

    Route::get('/about',            [OthersController::class, 'about'])->name('about');
    Route::get('/contact',          [OthersController::class, 'contact'])->name('contact');
    Route::post('/contact-message', [OthersController::class, 'contactMessage'])->name('contact.msg');
}); 

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/admin-dashboard',  [AdminController::class, 'index'])->name('admin.dashboard');
 });