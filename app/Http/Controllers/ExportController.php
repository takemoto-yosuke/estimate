<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckItem;
use App\Models\Estimate;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CheckItemsExport;
use App\Exports\EstimatesExport;

class ExportController extends Controller
{
    public function export()
    {
        $checkItems = CheckItem::all();
        $estimates = Estimate::all();

        return Excel::download(new CheckItemsExport($checkItems), 'check_items.csv');
        // return Excel::download(new EstimatesExport($estimates), 'estimates.csv');
    }
}
