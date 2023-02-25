<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    # User Income Section
    public function userIncome()
    {
        $title = 'Income';
        $incomeList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $incomeListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');
        $categories = Category::where('status', 1)->get();
        return view('user.income', compact('title', 'categories', 'incomeList', 'incomeListSum'));
    }

    # User Add Income Section
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

    # User Income Search by Date Range
    public function incomeSearchByDate(Request $request)
    {
        $title = 'Search Income';
        $categories = Category::where('status', 1)->get();

        $inputStartDate = $request->start_date;
        $inputEndDate   = $request->end_date;
        
        $start = $request->start_date.' '.'00:00:00';
        $end   = $request->end_date.' '.'23:59:00';

        $result = Wallet::whereBetween('created_at', [$start, $end])
        ->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->orderBy('created_at','desc')
        ->get();

        $resultSum = Wallet::whereBetween('created_at', [$start, $end])
        ->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->sum('amount');
        

        return view('user.search.income-search-by-date-range', compact('title', 'categories', 'result', 'inputStartDate', 'inputEndDate', 'resultSum'));

    }

    # User Income Filter by Month
    public function incomeSearchByMonth()
    {
        $title = 'Monthly Income';
        $categories = Category::where('status', 1)->get();
        
        $result = Wallet::whereYear('created_at', date('Y'))->where('status', 1)
        ->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','asc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->created_at->format('M');
        });
        $sumOfResult = collect();
        foreach ($result as $key => $value) {
            $sumOfResult[$key] = $value->sum('amount');
        }

        return view('user.search.income-filter-by-month', compact('title', 'categories', 'sumOfResult'));
    }

    # User Income Filter by Year
    public function incomeSearchByYear()
    {
        $title = 'Yearly Income';
        $categories = Category::where('status', 1)->get();
        
        $result = Wallet::where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->orderBy('created_at','desc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->created_at->format('Y');
        });
        $sumOfResult = collect();
        foreach ($result as $key => $value) {
            $sumOfResult[$key] = $value->sum('amount');
        }

        return view('user.search.income-filter-by-year', compact('title', 'categories', 'sumOfResult'));
    }

    # User Income Edit
    public function editIncome(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title'      => 'required|string|max:255',
            'amount'     => 'required',
            'purpose'    => 'required',
        ]);

        try
        {
            $wallet = Wallet::find($request->id);

            $wallet->title       = $request->title;
            $wallet->amount      = $request->amount;
            $wallet->status      = 1; //Income
            $wallet->category_id = $request->purpose;
            $wallet->user_id     = Auth::user()->id;
            $wallet->save();            
            return redirect()->route('user.income')->with('success','Update Income Info Successfully!');
        }
        catch (\Throwable $th) 
        {
            //throw $th;
            return redirect()->route('user.income')->with('error','Income Info Not Update!');
        }

    }

    # User Income Delete
    public function deleteIncome(Request $request)
    {
        $wallet = Wallet::find($request->id);
        $wallet->delete();

        return redirect()->route('user.income')->with('success', 'Income info delete successfully!');
    }

    /* ======================================================================================================================== */

    # User Expenses Section
    public function userExpense()
    {
        $title = 'Expenses';
        $expenseList = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','desc')->get();
        $expenseListSum = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');
        $categories = Category::where('status', 0)->get();
        return view('user.expense', compact('title', 'categories', 'expenseList', 'expenseListSum'));
    }

    # User Add Expenses Section
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

    # User Expenses Search by Date Range
    public function expenseSearchByDate(Request $request)
    {
        $title = 'Search Expenses';
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

    # User Expense Filter by Month
    public function expenseSearchByMonth()
    {
        $title = 'Monthly Expenses';
        $categories = Category::where('status', 0)->get();
        
        $result = Wallet::whereYear('created_at', date('Y'))->where('status', 0)
        ->where('user_id', Auth::user()->id)->with('categories')->orderBy('created_at','asc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->created_at->format('M');
        });
        $sumOfResult = collect();
        foreach ($result as $key => $value) {
            $sumOfResult[$key] = $value->sum('amount');
        }

        return view('user.search.expense-filter-by-month', compact('title', 'categories', 'sumOfResult'));
    }

    # User Expense Filter by Year
    public function expenseSearchByYear()
    {
        $title = 'Yearly Expenses';
        $categories = Category::where('status', 0)->get();
        
        $result = Wallet::where('status', 0)->where('user_id', Auth::user()->id)->with('categories')
        ->orderBy('created_at','desc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->created_at->format('Y');
        });
        $sumOfResult = collect();
        foreach ($result as $key => $value) {
            $sumOfResult[$key] = $value->sum('amount');
        }

        return view('user.search.expense-filter-by-year', compact('title', 'categories', 'sumOfResult'));
    }

    # User Expense Edit
    public function editExpense(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'amount'     => 'required',
            'purpose'    => 'required',
        ]);

        try
        {
            $wallet = Wallet::find($request->id);

            $wallet->title       = $request->title;
            $wallet->amount      = $request->amount;
            $wallet->category_id = $request->purpose;
            $wallet->user_id     = Auth::user()->id;
            $wallet->save();            
            return redirect()->route('user.expense')->with('success','Update Expense Info Successfully!');
        }
        catch (\Throwable $th) 
        {
            //throw $th;
            return redirect()->route('user.expense')->with('error','Expense Info Not Update!');
        }

    }

    # User Expense Delete
    public function deleteExpense(Request $request)
    {
        $wallet = Wallet::find($request->id);
        $wallet->delete();

        return redirect()->route('user.expense')->with('success', 'Expense info delete successfully!');
    }
}
