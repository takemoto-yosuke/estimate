<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegiCheckitem;

class RegiCheckitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegiCheckitem::create([
          'checkitem' => 'システム設置、DB設置、ヘッダ画像・メニュー表示・学会情報等設定',        
          'order' => 1,
        ]); 
        RegiCheckitem::create([
          'checkitem' => 'カテゴリ設定',        
          'order' => 2,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '領収証PDF発行機能または参加登録証PDF発行機能',        
          'order' => 3,
        ]); 
        RegiCheckitem::create([
          'checkitem' => 'セミナー申込機能（無料セミナー）　※カスタマイズは含みません。',        
          'order' => 4,
        ]); 
        RegiCheckitem::create([
          'checkitem' => 'セミナー申込機能（有料セミナー）　※カスタマイズは含みません。',        
          'order' => 5,
        ]); 
        RegiCheckitem::create([
          'checkitem' => 'コンビニエンスストア決済・ペイジー決済（日本語版のみ設置対象）',        
          'order' => 6,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '会員情報取込機能（簡易的な会員管理システムとの連携を実現）',        
          'order' => 7,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '団体登録取込機能',        
          'order' => 8,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '参加証明書',        
          'order' => 9,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB 設定・設置（カスタマイズ対応は含みません）',        
          'order' => 10,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB セミナー申込機能連携対応',        
          'order' => 11,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB Web開催用ID情報の中間DB連携（IDの存在確認、API設定ほか）',        
          'order' => 12,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB 連携用 中間DB設定・設置（券売機との連携対応後）',        
          'order' => 13,
        ]); 
        RegiCheckitem::create([
          'checkitem' => 'Web開催IDの発行機能',        
          'order' => 14,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '複数言語対応（日英バイリンガル対応）',        
          'order' => 15,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '団体登録読込対応',        
          'order' => 16,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '領収証PDF発行機能なし、参加登録証PDF発行機能なしの場合',        
          'order' => 17,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '領収証PDF発行機能または参加登録証PDF発行機能ありの場合',        
          'order' => 18,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '領収証PDF発行機能または参加登録証PDF発行機能あり、セミナー申込機能ありの場合',        
          'order' => 19,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB連携用WebAPI設置（1学会につき）　参照のみ',        
          'order' => 20,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB連携用WebAPI設置（1学会につき）　参照+書込',        
          'order' => 21,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB連携用WebAPIランニング（会期1日につき）',        
          'order' => 22,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB連携用WebAPIランニング（動画視聴サイト運用1日につき）',        
          'order' => 23,
        ]); 
        RegiCheckitem::create([
          'checkitem' => '中間DB会員テーブルへのDBアクセス用ポート開放対応（学会ごとランニング）',        
          'order' => 24,
        ]); 
        RegiCheckitem::create([
          'checkitem' => 'Web開催システムでの視聴確認用テーブル設置（Attend Status設置）',        
          'order' => 25,
        ]); 
        
    }
}
