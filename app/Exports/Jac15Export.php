<?php

namespace App\Exports;

use App\Jac15;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac15Export implements FromView
{

    public function view(): View
    {
        $jac15Reports = Jac15::orderBy('year_quarter', 'asc')->orderBy('add_date', 'desc')->get();
        

        return view('backend.report.template.jac15-table', [
            'jac15Reports' => $jac15Reports
        ]);
    }
}
