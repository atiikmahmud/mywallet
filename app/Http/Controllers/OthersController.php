<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function about()
    {
        $title = 'About';
        return view('user.others.about', compact('title'));
    }

    public function contact()
    {
        $title = 'Contact';
        return view('user.others.contact', compact('title'));
    }
}
