<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransectionController extends Controller
{
    public function loan()
    {
        $title = 'Loan';
        return view('user.transection.loan', compact('title'));
    }

    public function owed()
    {
        $title = 'Owed';
        return view('user.transection.owed', compact('title'));
    }

    public function payplan()
    {
        $title = 'Pay-Plan';
        return view('user.transection.payplan', compact('title'));
    }
}
