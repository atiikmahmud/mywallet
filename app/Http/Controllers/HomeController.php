<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
     {
        if(Auth::user())
        {
            return redirect('/redirect');
        }
        
        $title = 'Home Page';
        
        return view('welcome', compact('title'));
     }
}
