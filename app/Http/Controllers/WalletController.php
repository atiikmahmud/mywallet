<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function userIncome()
    {
        $title = 'Income';
        $incomeList = Wallet::where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $incomeListSum = Wallet::where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');
        $categories = Category::where('status', 1)->get();
        return view('user.income', compact('title', 'categories', 'incomeList', 'incomeListSum'));
    }

    public function addIncome(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'amount'     => 'required',
            'purpose'    => 'required',
        ]);

        try
        {
            $wallet = new Wallet;
            $wallet->title       = $request->title;
            $wallet->amount      = $request->amount;
            $wallet->status      = 1; //Income
            $wallet->category_id = $request->purpose;
            $wallet->user_id     = Auth::user()->id;
            $wallet->save();            
            return redirect()->back()->with('success','New Income Amount Added Successfully!');
        }
        catch (\Throwable $th) 
        {
            //throw $th;
            return redirect()->back()->with('error','New Income Amount Not Added!');
        }
    }

    public function userExpense()
    {
        $title = 'Expenses';
        $expenseList = Wallet::where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $expenseListSum = Wallet::where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');
        $categories = Category::where('status', 0)->get();
        return view('user.expense', compact('title', 'categories', 'expenseList', 'expenseListSum'));
    }

    public function addExpense(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'amount'     => 'required',
            'purpose'    => 'required',
        ]);

        try
        {
            $wallet = new Wallet;
            $wallet->title       = $request->title;
            $wallet->amount      = $request->amount;
            $wallet->category_id = $request->purpose;
            $wallet->user_id     = Auth::user()->id;
            $wallet->save();            
            return redirect()->back()->with('success','New Expense Amount Added Successfully!');
        }
        catch (\Throwable $th) 
        {
            //throw $th;
            return redirect()->back()->with('error','New Expense Amount Not Added!');
        }
    }

    public function expenseSearchByDate(Request $request)
    {
        $title = 'Search';
        $categories = Category::where('status', 0)->get();

        $inputStartDate = $request->start_date;
        $inputEndDate   = $request->end_date;
        
        $start = $request->start_date.' '.'00:00:00';
        $end   = $request->end_date.' '.'23:59:00';

        $result = Wallet::whereBetween('created_at', [$start, $end])
        ->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')
        ->get();

        $resultSum = Wallet::whereBetween('created_at', [$start, $end])
        ->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')
        ->sum('amount');
        

        return view('user.search.expense-search-by-date-range', compact('title', 'categories', 'result', 'inputStartDate', 'inputEndDate', 'resultSum'));

    }

    public function incomeSearchByDate(Request $request)
    {
        $title = 'Search';
        $categories = Category::where('status', 1)->get();

        $inputStartDate = $request->start_date;
        $inputEndDate   = $request->end_date;
        
        $start = $request->start_date.' '.'00:00:00';
        $end   = $request->end_date.' '.'23:59:00';

        $result = Wallet::whereBetween('created_at', [$start, $end])
        ->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->get();

        $resultSum = Wallet::whereBetween('created_at', [$start, $end])
        ->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->sum('amount');
        

        return view('user.search.income-search-by-date-range', compact('title', 'categories', 'result', 'inputStartDate', 'inputEndDate', 'resultSum'));

    }

    public function incomeSearchByMonth()
    {
        $title = 'Search';
        $categories = Category::where('status', 0)->get();
        
        $result = Wallet::where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->orderBy('created_at','desc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->created_at->format('Y-m');
        });

        dd($result->toArray());

        return view('user.search.income-search-by-month', compact('title', 'categories', 'result'));
    }

    public function incomeSearchByYear()
    {
        $result = Wallet::where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->orderBy('created_at','desc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->created_at->format('Y');
        });

        dd($result->toArray());
    }
}
