<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'category' => 'システム基本設定'          
        ]);      
        Category::create([
          'category' => 'ウェブ'          
        ]);
        Category::create([
          'category' => 'アプリ'          
        ]);
        Category::create([
          'category' => 'オプション'          
        ]);
        Category::create([
          'category' => 'カスタマイズ'          
        ]);
        Category::create([
          'category' => 'その他'          
        ]);
        Category::create([
          'category' => 'データ更新'          
        ]);
        Category::create([
          'category' => 'コンテナOSメンテ'          
        ]);
        Category::create([
          'category' => null          
        ]);
    }
}