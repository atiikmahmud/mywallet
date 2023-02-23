<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransectionController extends Controller
{
    public function loan()
    {
        dd('Loan-Page');
    }

    public function owed()
    {
        dd('Owed-Page');
    }

    public function payplan()
    {
        dd('PayPlan');
    }
}
