<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ResultsExport implements FromView
{
    /**
     * @return \Illuminate\Support\collection
     */
    public function view(): View
    {
        $results = Result::with(['respondent', 'service', 'question', 'option'])->get();
        $groupedResults = $results->groupBy(['respondent_id', 'service_id']);
        return view('admin.results.table', compact('groupedResults'));
    }
}
