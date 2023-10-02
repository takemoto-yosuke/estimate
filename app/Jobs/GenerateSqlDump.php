<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\Log;

class GenerateSqlDump implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function handle()
    {
        // 特定のテーブルのデータを取得してSQLファイルを生成
        $data = DB::table($this->table)->get();
        $sql = DB::raw("INSERT INTO " . $this->table . " VALUES (");

        foreach ($data as $row) {
            $values = [];
            foreach ($row as $value) {
                $values[] = DB::raw("'" . addslashes($value) . "'");
            }
            $sql .= implode(', ', $values) . ");\n";
        }

        // SQLファイルを一時的に保存
        $tempSqlFile = storage_path($this->table . '.sql');
        Storage::put($tempSqlFile, $sql);

        // 一時的に生成したSQLファイルをZIPに追加
        $zip = new \ZipArchive();
        $zipFilePath = storage_path('tables_dump.zip');

        if ($zip->open($zipFilePath, \ZipArchive::CREATE) === true) {
            $zip->addFile($tempSqlFile, $this->table . '.sql');
            $zip->close();
        }

        // 一時的なSQLファイルを削除
        unlink($tempSqlFile);
        unlink($zipFilePath);
    }
}
