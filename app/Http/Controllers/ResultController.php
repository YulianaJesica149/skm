<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{

    public function index()
    {
        $results = Result::with(['respondent', 'service', 'question', 'option'])->get();
        return view('admin.results.index', compact("results"));
    }
}
