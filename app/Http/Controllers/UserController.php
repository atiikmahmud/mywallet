<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function redirect()
     {
         $usertype = Auth::user()->usertype;
 
         if($usertype == 1)
         {
             return redirect('/admin-dashboard');
         }
         else
         {
             return redirect('/dashboard');
         }
     }    
    
    public function index()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == 1)
        {
            return redirect('/admin-dashboard');
        }
        
        $title = 'Dashboard';

        $totalIncome = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        $totalExpense = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')->sum('amount');

        $totalSavings = $totalIncome - $totalExpense;

        $incomeSummery = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 1)->where('user_id', Auth::user()->id)->with('categories')
        ->orderBy('created_at','desc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->category_id;
        });

        $incomeSummeryResult = collect();
        foreach ($incomeSummery as $key => $value) {
            $incomeSummeryResult[$key] = $value->sum('amount');
        }

        $expenseSummery = Wallet::whereMonth('created_at', Carbon::now()->month)->where('status', 0)->where('user_id', Auth::user()->id)->with('categories')
        ->orderBy('created_at','desc')
        ->get()
        ->groupBy(function (Wallet $item) {
            return $item->category_id;
        });

        $expenseSummeryResult = collect();
        foreach ($expenseSummery as $key => $value) {
            $expenseSummeryResult[$key] = $value->sum('amount');
        }        

        return view('user.dashboard', compact('title', 'totalIncome', 'totalExpense', 'totalSavings', 'incomeSummeryResult', 'expenseSummeryResult'));
    }

    public function profile()
    {
        $title  = 'Profile';
        $user   = User::where('id', Auth::user()->id)->first();
        return view('user.profile', compact('title', 'user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find($request->id);        

        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|min:11|max:14|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password'   => 'nullable|min:8|max:12',
            'n_password' => 'nullable|min:8|max:12',
            'c_password' => 'nullable|min:8|max:12'
        ]);

        try {
            if (!empty($request->password)) {
                if(empty($request->n_password) || empty($request->c_password))
                {
                    return redirect()->back()->with('error','New password & Confirm password is required');
                }
                if (Hash::check($request->password, auth()->user()->password)) {

                    if ($request->n_password == $request->c_password) {
                        $user->password = Hash::make($request->c_password);
                    } else {
                        return redirect()->back()->with('error','New Password & Confirm Password does not match !');
                    }
                } else {
                    return redirect()->back()->with('error','Current Password is not correct !');
                }
            }
            if (!empty($request->name)) {
                $user->name = $request->name;
            }
            if (!empty($request->phone)) {
                $user->phone = $request->phone;
            }

            $user->save();
            return redirect()->back()->with('success', 'Profile Information Updated !');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error','Profile not update');
        }
    }
}
