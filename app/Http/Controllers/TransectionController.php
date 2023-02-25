<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransectionController extends Controller
{
    # Loan
    public function loan()
    {
        $title = 'Loan';
        $categories = Category::where('status', 0)->get();
        $loans = Transection::where('status', 0)
        ->where('loan_status', 0)
        ->where('user_id', Auth::user()->id)
        ->with('categories')
        ->orderBy('created_at','desc')
        ->get();

        $loans_sum = Transection::where('status', 0)
        ->where('loan_status', 0)
        ->where('user_id', Auth::user()->id)
        ->with('categories')
        ->orderBy('created_at','desc')
        ->sum('amount');

        return view('user.transection.loan.loan', compact('title', 'categories', 'loans', 'loans_sum'));
    }

    # Paid Loan
    public function PaidLoan()
    {
        $title = 'Loan';
        $categories = Category::where('status', 0)->get();
        $loans = Transection::where('status', 0)
        ->where('loan_status', 1)
        ->where('user_id', Auth::user()->id)
        ->with('categories')
        ->orderBy('created_at','desc')
        ->get();

        $loans_sum = Transection::where('status', 0)
        ->where('loan_status', 1)
        ->where('user_id', Auth::user()->id)
        ->with('categories')
        ->orderBy('created_at','desc')
        ->sum('amount');

        return view('user.transection.loan.paidLoan', compact('title', 'categories', 'loans', 'loans_sum'));
    }

    # Action for Paid Loan
    public function loanAction(Request $request)
    {
        $action = Transection::find($request->id);
        $action->loan_status = 1;        
        $action->save();
        return redirect()->back()->with('success', 'Loan paid successfully');
    }

    # Add New Loan
    public function addNewLoan(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'amount'     => 'required',
            'purpose'    => 'required',
        ]);

        try
        {
            $wallet = new Transection;
            $wallet->title       = $request->title;
            $wallet->amount      = $request->amount;
            $wallet->category_id = $request->purpose;
            $wallet->user_id     = Auth::user()->id;
            $wallet->save();            
            return redirect()->back()->with('success','New Loan Amount Added Successfully!');
        }
        catch (\Throwable $th) 
        {
            //throw $th;
            return redirect()->back()->with('error','New Loan Amount Not Added!');
        }
    }

    # User Loan Edit
    public function editLoan(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'amount'     => 'required',
            'purpose'    => 'required',
        ]);

        try
        {
            $wallet = Transection::find($request->id);

            $wallet->title       = $request->title;
            $wallet->amount      = $request->amount;
            $wallet->category_id = $request->purpose;
            $wallet->user_id     = Auth::user()->id;
            $wallet->save();            
            return redirect()->back()->with('success','Update Loan Info Successfully!');
        }
        catch (\Throwable $th) 
        {
            //throw $th;
            return redirect()->back()>with('error','Loan Info Not Update!');
        }

    }

    # Delete Loan
    public function deleteLoan(Request $request)
    {
        $loan = Transection::find($request->id);
        $loan->delete();

        return redirect()->back()->with('success', 'Loan info delete successfully!');
    }


    /* ======================================================================================================================= */

    # Owed
    public function owed()
    {
        $title = 'Owed';
        return view('user.transection.owed', compact('title'));
    }

    /* ======================================================================================================================= */

    # Payment Plan
    public function payplan()
    {
        $title = 'Pay-Plan';
        return view('user.transection.payplan', compact('title'));
    }
}
