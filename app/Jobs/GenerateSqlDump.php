<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use ZipArchive;
use Illuminate\Support\Facades\Log;

class GenerateSqlDump implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        // テーブル情報をSQLファイルに書き込むロジックをここに追加
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = reset($table);
            $filename = storage_path('app/' . $tableName . '.sql');
            
            // メッセージをログに記録
            Log::info("Dumping table $tableName to $filename");
            
            $dumpCommand = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " $tableName > $filename";
            shell_exec($dumpCommand);
        }

        // ZIPファイルの保存先を指定
        $zipFilename = storage_path('dumps.zip');
        
        // メッセージをログに記録
        Log::info("Creating ZIP file for download: $zipFilename");

        $zip = new ZipArchive;
        if ($zip->open($zipFilename, ZipArchive::CREATE) === true) {
            $files = glob(storage_path('app/*.sql'));
            foreach ($files as $file) {
                $zip->addFile($file, basename($file));
            }
            $zip->close();
            
            // メッセージをログに記録
            Log::info('ZIP file created successfully.');
        } else {
            // エラーメッセージをログに記録
            Log::error('Failed to create ZIP file.');
        }
    }
}