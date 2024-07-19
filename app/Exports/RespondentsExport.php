<?php

namespace App\Exports;

use App\Models\Respondent;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class RespondentsExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $respondents = Respondent::all();
        return view("admin.respondents.table", compact('respondents'));
    }
}
