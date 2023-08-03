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

        //$csvData = $this->convertToCsv($checkItemsData);
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

    //private function convertToCsv($checkItemsData)
private function convertToCsv($checkItemsData, $estimatesData)
{
    $stream = fopen('php://temp', 'w+');

    // BOMを付ける
    fwrite($stream, "\xEF\xBB\xBF");

    // check_itemsのデータをCSVに追加
    foreach ($checkItemsData as $item) {
        $itemArray = (array) $item;
        $itemArray['created_at'] = Carbon::parse($item->created_at)->format('Y-m-d H:i:s');
        $itemArray['updated_at'] = Carbon::parse($item->updated_at)->format('Y-m-d H:i:s');
        fputcsv($stream, $itemArray);
    }

    // 空行を追加
    fputcsv($stream, []);

    // estimatesのデータをCSVに追加
    foreach ($estimatesData as $estimate) {
        $estimateArray = (array) $estimate;
        $estimateArray['created_at'] = Carbon::parse($estimate->created_at)->format('Y-m-d H:i:s');
        $estimateArray['updated_at'] = Carbon::parse($estimate->updated_at)->format('Y-m-d H:i:s');
        fputcsv($stream, $estimateArray);
    }

    rewind($stream);
    $csvData = stream_get_contents($stream);
    fclose($stream);

    return $csvData;
}
}
