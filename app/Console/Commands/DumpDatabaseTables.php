<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use ZipArchive;

class DumpDatabaseTables extends Command
{
    protected $signature = 'db:dump-tables';
    protected $description = 'Dump database tables to SQL file';    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // テーブル情報をSQLファイルに書き込むロジックをここに追加する
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = reset($table);
            $filename = database_path('dumps/' . $tableName . '.sql');
            $this->info("Dumping table $tableName to $filename");
            $dumpCommand = "mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." $tableName > $filename";
            shell_exec($dumpCommand);
        }

        // ファイルをZIPアーカイブにまとめる前のファイル保存先
        $sqlFilePath = storage_path('dumps.zip');

        // ZIPファイルの保存先を指定
        $zipFilename = storage_path('dumps.zip');

        // ZIPファイルを作成
        $zip = new ZipArchive;
        if ($zip->open($zipFilename, ZipArchive::CREATE) === true) {
            $files = glob(database_path('dumps/*'));
            foreach ($files as $file) {
                $zip->addFile($file, basename($file));
            }
            $zip->close();
            $this->info('ZIP file created successfully.');

            // ダウンロードリンクを表示
            $this->info("Download link: " . asset('storage/app/dumps.zip'));
        } else {
            $this->error('Failed to create ZIP file.');
        }
    }
}
