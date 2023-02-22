<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function userIncome()
    {
        $title = 'Income';
        $incomeList = Wallet::where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->get();
        $incomeListSum = Wallet::where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');
        $categories = Category::where('status', 1)->get();
        return view('user.income', compact('title', 'categories', 'incomeList', 'incomeListSum'));
    }

    public function addIncome(Request $request)
    {
        // dd($request->all());

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
        $expenseList = Wallet::where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->get();
        $expenseListSum = Wallet::where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');
        $categories = Category::where('status', 0)->get();
        return view('user.expense', compact('title', 'categories', 'expenseList', 'expenseListSum'));
    }

    public function addExpense(Request $request)
    {
        // dd($request->all());

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
}
