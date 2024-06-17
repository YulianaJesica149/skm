<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Exports\ResultsExport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ResultController extends Controller
{

    public function index()
    {
        $results = Result::with(['respondent', 'service', 'question', 'option'])->get();
        $groupedResults = $results->groupBy(['respondent_id', 'service_id']);
        return view('admin.results.index', compact('groupedResults'));
    }

    public function export()
    {
        return Excel::download(new ResultsExport, 'results-' . Carbon::now()->timestamp . '.xlsx');
    }
}
