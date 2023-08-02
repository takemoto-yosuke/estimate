<?php
// app/Http/Controllers/DownloadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Carbon;

class DownloadController extends Controller
{
    public function downloadData()
    {
        $checkItemsData = DB::table('check_items')->get();
        $estimatesData = DB::table('estimates')->get();

        $csvData = $this->convertToCsv($checkItemsData, $estimatesData);

        $filename = 'estimate_' . Carbon::now()->format('YmdHis') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return new StreamedResponse(function () use ($csvData) {
            echo $csvData;
        }, 200, $headers);
    }

    private function convertToCsv($checkItemsData, $estimatesData)
    {
        $stream = fopen('php://temp', 'w+');

        // BOMを付ける
        fwrite($stream, "\xEF\xBB\xBF");

        // check_itemsのデータをCSVに追加
        fputcsv($stream, array_keys((array) $checkItemsData[0]));
        foreach ($checkItemsData as $item) {
            fputcsv($stream, (array) $item);
        }

        // estimatesのデータをCSVに追加
        fputcsv($stream, array_keys((array) $estimatesData[0]));
        foreach ($estimatesData as $estimate) {
            fputcsv($stream, (array) $estimate);
        }

        rewind($stream);
        $csvData = stream_get_contents($stream);
        fclose($stream);

        return $csvData;
    }
}
