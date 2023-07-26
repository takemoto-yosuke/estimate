<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CheckItem;

class CheckItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CheckItem::create([
          'checkitem' => '運用',          
          'machine' => 'common',
          'first_estimate' => 1,
          'order' => 1,
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 3,      
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 外字マップメンテナンス',          
          'machine' => 'common',  
          'order' => 4,                  
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 外字作成',          
          'machine' => 'common',  
          'order' => 5,                  
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 個別調整',          
          'machine' => 'common',  
          'order' => 7,                  
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 全日程セッションの文言変更（見出し・ツメ）',          
          'machine' => 'common',  
          'order' => 6,                  
        ]); 
        CheckItem::create([
          'checkitem' => '展示',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 25,                   
        ]); 
        CheckItem::create([
          'checkitem' => '展示マップ　※100社程度想定' ,          
          'machine' => 'app',      
          'first_estimate' => 1,  
          'order' => 26,                
        ]); 
        CheckItem::create([
          'checkitem' => '展示「はい/いいえ」画面設置',          
          'machine' => 'common',      
          'first_estimate' => 1,  
          'order' => 27,            
        ]); 
        CheckItem::create([
          'checkitem' => 'セッションアンケート・資料ダウンロード',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 22,            
        ]); 
        CheckItem::create([
          'checkitem' => '大会アンケート',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 23,            
        ]); 
        CheckItem::create([
          'checkitem' => '大会資料アップロード（インフォメーションボード）',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 24,            
        ]); 
        CheckItem::create([
          'checkitem' => 'テキストダウンロード（セッションPDF/演題PDF）認証画面あり',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 20,            
        ]); 
        CheckItem::create([
          'checkitem' => 'テキストダウンロード（セッションPDF/演題PDF）認証画面なし、PDFの設置、ボタン文言変更対応のみ',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 21,            
        ]); 
        CheckItem::create([
          'checkitem' => 'デジタルポスター',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 8,                   
        ]); 
        CheckItem::create([
          'checkitem' => 'LIVE/オンデマンド',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 9,                   
        ]); 
        CheckItem::create([
          'checkitem' => '有料セミナー',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 10,                   
        ]); 
        CheckItem::create([
          'checkitem' => '認証付き外部リンク',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 12,                   
        ]); 
        CheckItem::create([
          'checkitem' => '参加証明書',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 33,            
        ]); 
        CheckItem::create([
          'checkitem' => '質問投稿と管理機能',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 19,            
        ]); 
        CheckItem::create([
          'checkitem' => '各種ご案内',          
          'machine' => 'web',      
          'first_estimate' => 1,  
          'order' => 44,                            
        ]); 
        CheckItem::create([
          'checkitem' => '広告　アプリ表紙フッター',          
          'machine' => 'app',  
          'order' => 37,                            
        ]); 
        CheckItem::create([
          'checkitem' => '広告　アプリ起動時',          
          'machine' => 'app',  
          'order' => 38,                            
        ]); 
        CheckItem::create([
          'checkitem' => '広告　ウェブ版左トップ　※タイルレイアウトの時のみ',          
          'machine' => 'web',  
          'order' => 39,        
        ]); 
        CheckItem::create([
          'checkitem' => '広告　ウェブ版左メニュー/モバイル版フッター',          
          'machine' => 'web',    
          'first_estimate' => 1,  
          'order' => 40,          
        ]); 
        CheckItem::create([
          'checkitem' => '広告　MyAb前付・後付への広告ページ差込',          
          'machine' => 'common',  
          'order' => 41,            
        ]); 
        CheckItem::create([
          'checkitem' => '大会フィルタ',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 14,            
        ]); 
        CheckItem::create([
          'checkitem' => '大会別抄録前PW制限',          
          'machine' => 'app',  
          'order' => 15,                            
        ]); 
        CheckItem::create([
          'checkitem' => '分野フィルタ',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 16,            
        ]); 
        CheckItem::create([
          'checkitem' => '関連情報フィルタ',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 17,            
        ]); 
        CheckItem::create([
          'checkitem' => '日程表アイコンカスタマイズ',          
          'machine' => 'common',      
          'first_estimate' => 1,  
          'order' => 47,            
        ]); 
        CheckItem::create([
          'checkitem' => '表紙カスタマイズ',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 2,                            
        ]); 
        CheckItem::create([
          'checkitem' => '文言変更',          
          'machine' => 'common',      
          'first_estimate' => 1,  
          'order' => 46,            
        ]); 
        CheckItem::create([
          'checkitem' => '日程表コマ名指定（5件以上）',          
          'machine' => 'app',  
          'order' => 43,                            
        ]); 
        CheckItem::create([
          'checkitem' => '日程表タブ(icon・文言)変更（アプリ版）',          
          'machine' => 'app',  
          'order' => 48,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'アプリ版トップからの参加登録サイト呼び出し',          
          'machine' => 'app',  
          'order' => 49,                            
        ]); 
        CheckItem::create([
          'checkitem' => '会期5日間以上の日程表タブ調整（ウェブ版）',          
          'machine' => 'web',  
          'order' => 50,            
        ]); 
        CheckItem::create([
          'checkitem' => '視聴履歴',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 11,            
        ]); 
        CheckItem::create([
          'checkitem' => '共催セミナー',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 51,            
        ]); 
        CheckItem::create([
          'checkitem' => 'スポンサー',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 34,            
        ]); 
        CheckItem::create([
          'checkitem' => 'スポンサー一覧（HTML）　※100社程度想定' ,          
          'machine' => 'common',  
          'order' => 35,           
        ]); 
        CheckItem::create([
          'checkitem' => 'プログラム一覧（タブ分けコマ表示）',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 52,            
        ]); 
        CheckItem::create([
          'checkitem' => '紙面開催（日時会場無し）',          
          'machine' => 'common',  
          'order' => 53,            
        ]); 
        CheckItem::create([
          'checkitem' => '各種ご案内、開催概要作成なし',          
          'machine' => 'app',    
          'first_estimate' => 1,  
          'order' => 45,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'フロアマップ作成なし',          
          'machine' => 'app',    
          'first_estimate' => 1,  
          'order' => 42,                            
        ]); 
        CheckItem::create([
          'checkitem' => '時間外のWeb開催ID有効化作業',          
          'machine' => 'common',  
          'order' => 54,            
        ]); 
        CheckItem::create([
          'checkitem' => 'データ更新',          
          'machine' => 'both',      
          'first_estimate' => 1,  
          'order' => 55,            
        ]); 
        CheckItem::create([
          'checkitem' => 'コンテナOSメンテ',          
          'machine' => 'app',    
          'first_estimate' => 1,  
          'order' => 56,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ランチョン',          
          'machine' => 'app',    
          'first_estimate' => 1,  
          'order' => 13,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライト',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 28,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライトトップページ',          
          'machine' => 'both',    
          'first_estimate' => 1,  
          'order' => 29,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライトアイコン表示（共催セミナーページ）',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 30,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライトリンク追加',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 31,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライト表示方式追加',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 32,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'サムネイル表示内容選択',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 36,                            
        ]); 
        CheckItem::create([
          'checkitem' => 'リンク指定',          
          'machine' => 'common',    
          'first_estimate' => 1,  
          'order' => 18,                            
        ]); 
        
        
    }
}
