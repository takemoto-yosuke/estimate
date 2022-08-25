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
          'category' => 'システム基本設定',     
          'sort' => 1
        ]);      
        Category::create([
          'category' => 'ウェブ',     
          'sort' => 2          
        ]);
        Category::create([
          'category' => 'アプリ',     
          'sort' => 3          
        ]);
        Category::create([
          'category' => 'オプション',     
          'sort' => 4          
        ]);
        Category::create([
          'category' => 'カスタマイズ',     
          'sort' => 5          
        ]);
        Category::create([
          'category' => 'その他',     
          'sort' => 6          
        ]);
        Category::create([
          'category' => 'データ更新',     
          'sort' => 7          
        ]);
        Category::create([
          'category' => 'コンテナOSメンテ',     
          'sort' => 8          
        ]);
        Category::create([
          'category' => null,     
          'sort' => 9          
        ]);
    }
}