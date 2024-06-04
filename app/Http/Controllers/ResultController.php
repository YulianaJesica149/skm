<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{

    public function index()
    {
        $results = Result::all();
        // $results = Result::with('Option')->get();
        return view('admin.results.index', compact('results'));
    }
}
