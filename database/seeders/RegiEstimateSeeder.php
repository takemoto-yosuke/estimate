<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegiEstimate;

class RegiEstimateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegiEstimate::create([
          'category_id' => 1,      
          'content' => 'システム設置、DB設置、ヘッダ画像・メニュー表示・学会情報等設定',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 150000,        
          'prise' => 150000,                  
          'checkitem_id' => 1,           
        ]); 
        RegiEstimate::create([
          'category_id' => 1,      
          'content' => '基本設定（サイト設定、申込カテゴリ設定、公開日時設定）',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 1,           
        ]); 
        RegiEstimate::create([
          'category_id' => 1,      
          'content' => '搭載管理機能（各種自動応答メール設定、一斉送信メール設定）',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 1,           
        ]); 
        RegiEstimate::create([
          'category_id' => 1,      
          'content' => 'カテゴリ設定',       
          'quantity' => 1,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 35000,                  
          'checkitem_id' => 2,           
        ]); 
        
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '領収証PDF発行機能または参加登録証PDF発行機能',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 50000,        
          'prise' => 50000,                  
          'checkitem_id' => 3,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => 'セミナー申込機能（無料セミナー）　※カスタマイズは含みません。',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 100000,        
          'prise' => 100000,                  
          'checkitem_id' => 4,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => 'セミナー申込機能（有料セミナー）　※カスタマイズは含みません。',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 140000,        
          'prise' => 140000,                  
          'checkitem_id' => 5,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => 'コンビニエンスストア決済・ペイジー決済（日本語版のみ設置対象）',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 60000,        
          'prise' => 60000,                  
          'checkitem_id' => 6,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '会員情報取込機能（簡易的な会員管理システムとの連携を実現）',       
          'quantity' => 3,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 105000,                  
          'checkitem_id' => 7,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '団体登録取込機能',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 60000,        
          'prise' => 60000,                  
          'checkitem_id' => 8,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '※団体登録データ読込（アカウント読込）、団体登録データ読込（参加登録読込）',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 8,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '参加証明書 ※PDFのレイアウトが特殊な場合は別途御見積となる場合があります。',       
          'quantity' => 2,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 70000,                  
          'checkitem_id' => 9,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '中間DB 設定・設置（カスタマイズ対応は含みません）',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 50000,        
          'prise' => 50000,                  
          'checkitem_id' => 10,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '中間DB セミナー申込機能連携対応',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 50000,        
          'prise' => 50000,                  
          'checkitem_id' => 11,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '中間DB Web開催用ID情報の中間DB連携（IDの存在確認、API設定ほか）',       
          'quantity' => 1,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 35000,                  
          'checkitem_id' => 12,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '中間DB 連携用 中間DB設定・設置（券売機との連携対応後）',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 80000,        
          'prise' => 80000,                  
          'checkitem_id' => 13,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => 'Web開催IDの発行機能',       
          'quantity' => 5,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 175000,                  
          'checkitem_id' => 14,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '基本対応 新規アカウント作成時、ログインIDに対して、Web開催用用ID/PWを発行',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 14,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '　　　　 対応付けたWeb開催用ID/PWを画面上に表示',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 14,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '　　　　 一斉送信メール及び参加登録完了メールに、Web開催用ID/PWの差込コードを用意',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 14,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '複数言語対応（日英バイリンガル対応）',       
          'quantity' => 1,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 35000,                  
          'checkitem_id' => 15,           
        ]); 
        RegiEstimate::create([
          'category_id' => 2,      
          'content' => '団体登録読込対応',       
          'quantity' => 1,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 35000,                  
          'checkitem_id' => 16,           
        ]); 
        
        RegiEstimate::create([
          'category_id' => 3,      
          'content' => '領収証PDF発行機能なし、参加登録証PDF発行機能なしの場合',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 60000,        
          'prise' => 60000,                  
          'checkitem_id' => 17,           
        ]); 
        RegiEstimate::create([
          'category_id' => 3,      
          'content' => '領収証PDF発行機能または参加登録証PDF発行機能ありの場合',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 80000,        
          'prise' => 80000,                  
          'checkitem_id' => 18,           
        ]); 
        RegiEstimate::create([
          'category_id' => 3,      
          'content' => '領収証PDF発行機能または参加登録証PDF発行機能あり、セミナー申込機能ありの場合',       
          'quantity' => 1,          
          'unit' => '式',          
          'unit_prise' => 100000,        
          'prise' => 100000,                  
          'checkitem_id' => 19,           
        ]); 
        
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '中間DB連携用WebAPI設置（1学会につき）　参照のみ',       
          'quantity' => 1,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 35000,                  
          'checkitem_id' => 20,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '中間DB連携用WebAPI設置（1学会につき）　参照+書込',       
          'quantity' => 1.5,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 52500,                  
          'checkitem_id' => 21,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '中間DB連携用WebAPIランニング（会期1日につき）',       
          'quantity' => 1,          
          'unit' => '日',          
          'unit_prise' => 10000,        
          'prise' => 10000,                  
          'checkitem_id' => 22,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '中間DB連携用WebAPIランニング（動画視聴サイト運用1日につき）',       
          'quantity' => 1,          
          'unit' => '日',          
          'unit_prise' => 3000,        
          'prise' => 3000,                  
          'checkitem_id' => 23,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '中間DB会員テーブルへのDBアクセス用ポート開放対応（学会ごとランニング）',       
          'quantity' => 0.5,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 17500,                  
          'checkitem_id' => 24,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => 'Web開催システムでの視聴確認用テーブル設置（Attend Status設置）',       
          'quantity' => 1,          
          'unit' => '人日',          
          'unit_prise' => 35000,        
          'prise' => 35000,                  
          'checkitem_id' => 25,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '※以下の項目を設置し、Web開催システムからの情報連携あり',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 25,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '※Web開催システムで閲覧完了と同時に新設テーブルに値を格納',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 25,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '　 Web参加ID、演題管理番号、演題登録番号、セッションNo、受講完了日、取消フラグ、備考1-10',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 25,           
        ]); 
        RegiEstimate::create([
          'category_id' => 4,      
          'content' => '※Web開催との連携動作確認（弊社のWeb開催システム運用前提）含む',       
          'quantity' => null,          
          'unit' => null,          
          'unit_prise' => null,        
          'prise' => null,                  
          'checkitem_id' => 25,           
        ]); 
    }
}
