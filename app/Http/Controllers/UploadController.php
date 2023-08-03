<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CheckItem;
use App\Models\Estimate;

class UploadController extends Controller
{
    public function uploadData(Request $request)
    {
        $file = $request->file('csv_file');

        // バリデーションなど必要に応じて追加

        if ($file->isValid()) {
            $filePath = $file->getRealPath();
            $data = $this->readCsvFile($filePath);

            // データベースへの書き込み処理
            DB::table('check_items')->truncate();
            DB::table('estimates')->truncate(); // 追加: estimatesテーブルを一旦空にする

            // ヘッダー行を除外し、実際のデータのみを取得
            $checkItemsData = [];
            $estimatesData = [];
            $isEstimatesData = false;

            foreach ($data as $row) {
                // 空行が見つかったら、以降の行はestimatesテーブルのデータとする
                if (empty(array_filter($row))) {
                    $isEstimatesData = true;
                    continue;
                }

                // estimatesテーブルのデータの場合、$estimatesDataに追加
                if ($isEstimatesData) {
                    $estimatesData[] = $row;
                } else {
                    $checkItemsData[] = $row;
                }
            }

            // "check_items"テーブルのデータを挿入
            foreach ($checkItemsData as $row) {
                CheckItem::create([
                    'id' => $row[0],
                    'checkitem' => $row[1],
                    'machine' => $row[2],
                    'first_estimate' => $row[3],
                    'order' => $row[4],
                    'created_at' => $row[5],
                    'updated_at' => $row[6],
                ]);
            }

            // "estimates"テーブルのデータを挿入
            foreach ($estimatesData as $row) {
                Estimate::create([
                    'id' => $row[0],
                    'category_id' => $row[1],
                    'item' => $row[2],
                    'content' => $row[3],
                    'quantity' => $row[4],
                    'unit' => $row[5],
                    'unit_prise' => $row[6],
                    'prise' => $row[7],
                    'machine' => $row[8],
                    'lang' => $row[9],
                    'checkitem_id' => $row[10],
                    'order' => $row[11],
                    'created_at' => $row[12],
                    'updated_at' => $row[13],
                ]);
            }

            return redirect()->back()->with('success', 'データをアップロードしました。');
        } else {
            return redirect()->back()->with('error', 'ファイルアップロードが失敗しました。');
        }
    }

    private function readCsvFile($filePath)
    {
        $data = [];
        $file = fopen($filePath, 'r');

        // BOMを除去する
        if (substr(PHP_OS, 0, 3) == 'WIN') {
            // Windowsの場合、BOMはUTF-8ファイルにのみ存在
            $bom = pack('H*', 'EFBBBF');
            $firstLine = fgets($file);
            if (strpos($firstLine, $bom) !== false) {
                $firstLine = substr($firstLine, 3);
            }
            $data[] = str_getcsv($firstLine);
        }

        while (($line = fgetcsv($file)) !== false) {
            $data[] = $line;
        }

        fclose($file);
        return $data;
    }
}