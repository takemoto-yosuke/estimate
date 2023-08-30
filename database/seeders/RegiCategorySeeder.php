<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegiCategory;

class RegiCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegiCategory::create([
          'category' => '基本システム設置・設定',     
          'sort' => 1
        ]);  
        RegiCategory::create([
          'category' => 'オプション',     
          'sort' => 2
        ]);  
        RegiCategory::create([
          'category' => '複数言語対応（日英バイリンガル版）',     
          'sort' => 3
        ]);  
        RegiCategory::create([
          'category' => 'WebAPI関連',     
          'sort' => 4
        ]);  
    }
}
