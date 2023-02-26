<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallet;
use Illuminate\Http\Request;
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

    public function monthlyIncome()
    {
        $incomeList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $incomeListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        return view('user.report.monthly-income', compact('incomeList', 'incomeListSum'));
    }

    public function downloadPDF()
    {
        $incomeList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $incomeListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        $pdf = PDF::loadView('user.report.monthly-income', compact('incomeList', 'incomeListSum'));
        return $pdf->download('Monthly Income Report.pdf');
    }
}
