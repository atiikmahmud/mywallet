<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Report';
        return view('user.report.report', compact('title'));
    }

    /* ======================================= Monthly Income Report ============================================================*/

    public function monthlyIncome()
    {
        $title = 'Report';
        return view('user.report.monthly-income-report', compact('title'));
    }

    public function monthlyIncomeReport()
    {
        $incomeList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $incomeListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        return view('user.report.monthly-income-report-pdf', compact('incomeList', 'incomeListSum'));
    }

    public function monthlyIncomePDF()
    {
        $incomeList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $incomeListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        $pdf = PDF::loadView('user.report.monthly-income-report-pdf', compact('incomeList', 'incomeListSum'));

        return $pdf->download('Monthly Income Report.pdf');
    }

    /* ======================================= Monthly Expense Report ============================================================*/

    public function monthlyExpense()
    {
        $title = 'Report';
        return view('user.report.monthly-expense-report', compact('title'));
    }

    public function monthlyExpenseReport()
    {
        $expenseList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $expenseListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        return view('user.report.monthly-expense-report-pdf', compact('expenseList', 'expenseListSum'));
    }

    public function monthlyExpensePDF()
    {
        $expenseList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $expenseListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        $pdf = PDF::loadView('user.report.monthly-expense-report-pdf', compact('expenseList', 'expenseListSum'));

        return $pdf->download('Monthly Expense Report.pdf');
    }

}
