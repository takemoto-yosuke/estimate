<?php
// app/Http/Controllers/DownloadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Carbon;
use App\Jobs\GenerateSqlDump;
use Illuminate\Support\Facades\Session;
use ZipArchive;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
/*    public function downloadData()
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
*/
    public function RegidownloadData()
    {
        $checkItemsData = DB::table('regi_checkitems')->get();
        $estimatesData = DB::table('regi_estimates')->get();

        //$csvData = $this->convertToCsv($checkItemsData);
        $csvData = $this->RegiconvertToCsv($checkItemsData, $estimatesData);

        $filename = 'regi_estimate_' . Carbon::now()->format('YmdHis') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return new StreamedResponse(function () use ($csvData) {
            echo $csvData;
        }, 200, $headers);
    }

        //private function convertToCsv($checkItemsData)
    private function RegiconvertToCsv($checkItemsData, $estimatesData)
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
    
 
    public function generateAndDownload(Request $request)
    {
        // エクスポートしたいテーブルのテーブル名を指定します
        $tableNames = ['check_items', 'estimates'];
    
        $zipFileName = 'tables_dump.zip';
        $timestamp = date('YmdHis'); // 現在の日付と時刻を取得
        $zipFileNameWithDate = "tables_dump_{$timestamp}.zip"; // 日付を含む新しいファイル名
        $zipFilePath = storage_path("{$zipFileName}");
    
    
        $zip = new ZipArchive();
        $zip->open($zipFilePath, ZipArchive::CREATE);
    
        foreach ($tableNames as $tableName) {
            // 各テーブル用のSQLダンプを生成します
            $dumpFileName = "{$tableName}_dump.sql";
            $dumpFilePath = storage_path("{$dumpFileName}");
    
            // mysqldumpコマンドを使ってSQLダンプを生成
            $command = sprintf(
                'mysqldump -u%s -p%s %s %s > %s',
                config('database.connections.mysql.username'),
                config('database.connections.mysql.password'),
                config('database.connections.mysql.database'),
                $tableName,
                $dumpFilePath
            );
    
            exec($command);
    
            // ZIPファイルにSQLダンプファイルを追加
            $zip->addFile($dumpFilePath, $dumpFileName);
        }
    
        $zip->close();
        
        foreach ($tableNames as $tableName) {
            // 各テーブル用のSQLダンプを生成した後に、ファイルを削除
            $dumpFileName = "{$tableName}_dump.sql";
            $dumpFilePath = storage_path("{$dumpFileName}");
            unlink($dumpFilePath);
        }    
    
        // ダウンロード用のレスポンスを作成
        $headers = [
            'Content-Type' => 'application/zip',
        ];
    
        return response()->download($zipFilePath, $zipFileNameWithDate, $headers);
    }
    
    public function importDatabase(Request $request)
    {
        // アップロードされたZIPファイルを取得
        $zipFile = $request->file('database_dump');

        // ZIPファイルを一時ディレクトリに保存
        $tempPath = tempnam(sys_get_temp_dir(), 'database_dump');
        $zipFile->move(sys_get_temp_dir(), $tempPath);

        // ZIPファイルを解凍
        $zip = new ZipArchive;
        if ($zip->open($tempPath) === true) {
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);

                // SQLファイルをデータベースにインポート
                if (pathinfo($filename, PATHINFO_EXTENSION) === 'sql') {
                    $sqlContents = file_get_contents('zip://' . $tempPath . '#' . $filename);
                    DB::unprepared($sqlContents);
                }
            }
            $zip->close();
        }

        // 一時ファイルを削除
        unlink($tempPath);

        return redirect()->back()->with('success', 'データベースにインポートが完了しました。');
    }
}
