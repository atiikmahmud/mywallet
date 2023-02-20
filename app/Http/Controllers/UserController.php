<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard', compact('title'));
    }
}
