<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Report';
        return view('user.report.report', compact('title'));
    }
}
