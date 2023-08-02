<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckItem;
use App\Models\Estimate;

class ImportController extends Controller
{
    public function showForm()
    {
        return view('import.form');
    }

    public function importData(Request $request)
    {
        // アップロードされたCSVファイルを処理する
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            // ここでCSVファイルをパースし、データベースに保存する処理を実装する
        }

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
