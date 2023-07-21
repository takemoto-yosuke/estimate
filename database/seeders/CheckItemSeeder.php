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
          'first_estimate' => 1
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts',          
          'machine' => 'both',    
          'first_estimate' => 1        
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 外字マップメンテナンス',          
          'machine' => 'common'            
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 外字作成',          
          'machine' => 'common'            
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 個別調整',          
          'machine' => 'common'            
        ]); 
        CheckItem::create([
          'checkitem' => 'MyAbstracts 全日程セッションの文言変更（見出し・ツメ）',          
          'machine' => 'common'            
        ]); 
        CheckItem::create([
          'checkitem' => '展示',          
          'machine' => 'both',    
          'first_estimate' => 1                   
        ]); 
        CheckItem::create([
          'checkitem' => '展示マップ　※100社程度想定' ,          
          'machine' => 'app',      
          'first_estimate' => 1                
        ]); 
        CheckItem::create([
          'checkitem' => '展示「はい/いいえ」画面設置',          
          'machine' => 'common',      
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => 'セッションアンケート・資料ダウンロード',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '大会アンケート',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '大会資料アップロード（インフォメーションボード）',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => 'テキストダウンロード（セッションPDF/演題PDF）認証画面あり',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => 'テキストダウンロード（セッションPDF/演題PDF）認証画面なし、PDFの設置、ボタン文言変更対応のみ',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => 'デジタルポスター',          
          'machine' => 'both',    
          'first_estimate' => 1                   
        ]); 
        CheckItem::create([
          'checkitem' => 'LIVE/オンデマンド',          
          'machine' => 'both',    
          'first_estimate' => 1                   
        ]); 
        CheckItem::create([
          'checkitem' => '有料セミナー',          
          'machine' => 'both',    
          'first_estimate' => 1                   
        ]); 
        CheckItem::create([
          'checkitem' => '認証付き外部リンク',          
          'machine' => 'both',    
          'first_estimate' => 1                   
        ]); 
        CheckItem::create([
          'checkitem' => '参加証明書',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '質問投稿と管理機能',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '各種ご案内',          
          'machine' => 'web',      
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => '広告　アプリ表紙フッター',          
          'machine' => 'app'                            
        ]); 
        CheckItem::create([
          'checkitem' => '広告　アプリ起動時',          
          'machine' => 'app'                            
        ]); 
        CheckItem::create([
          'checkitem' => '広告　ウェブ版左トップ　※タイルレイアウトの時のみ',          
          'machine' => 'web'        
        ]); 
        CheckItem::create([
          'checkitem' => '広告　ウェブ版左メニュー/モバイル版フッター',          
          'machine' => 'web',    
          'first_estimate' => 1          
        ]); 
        CheckItem::create([
          'checkitem' => '広告　MyAb前付・後付への広告ページ差込',          
          'machine' => 'common'            
        ]); 
        CheckItem::create([
          'checkitem' => '大会フィルタ',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '大会別抄録前PW制限',          
          'machine' => 'app'                            
        ]); 
        CheckItem::create([
          'checkitem' => '分野フィルタ',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '関連情報フィルタ',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '日程表アイコンカスタマイズ',          
          'machine' => 'common',      
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '表紙カスタマイズ',          
          'machine' => 'both',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => '文言変更',          
          'machine' => 'common',      
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '日程表コマ名指定（5件以上）',          
          'machine' => 'app'                            
        ]); 
        CheckItem::create([
          'checkitem' => '日程表タブ(icon・文言)変更（アプリ版）',          
          'machine' => 'app'                            
        ]); 
        CheckItem::create([
          'checkitem' => 'アプリ版トップからの参加登録サイト呼び出し',          
          'machine' => 'app'                            
        ]); 
        CheckItem::create([
          'checkitem' => '会期5日間以上の日程表タブ調整（ウェブ版）',          
          'machine' => 'web'            
        ]); 
        CheckItem::create([
          'checkitem' => '視聴履歴',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '共催セミナー',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => 'スポンサー',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => 'スポンサー一覧（HTML）　※100社程度想定' ,          
          'machine' => 'common'           
        ]); 
        CheckItem::create([
          'checkitem' => 'プログラム一覧（タブ分けコマ表示）',          
          'machine' => 'common',    
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => '紙面開催（日時会場無し）',          
          'machine' => 'common'            
        ]); 
        CheckItem::create([
          'checkitem' => '各種ご案内、開催概要作成なし',          
          'machine' => 'app',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'フロアマップ作成なし',          
          'machine' => 'app',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => '時間外のWeb開催ID有効化作業',          
          'machine' => 'common'            
        ]); 
        CheckItem::create([
          'checkitem' => 'データ更新',          
          'machine' => 'both',      
          'first_estimate' => 1            
        ]); 
        CheckItem::create([
          'checkitem' => 'コンテナOSメンテ',          
          'machine' => 'app',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ランチョン',          
          'machine' => 'app',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライト',          
          'machine' => 'both',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライトトップページ',          
          'machine' => 'both',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライトアイコン表示（共催セミナーページ）',          
          'machine' => 'common',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'ハイライトリンク',          
          'machine' => 'common',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'サムネイル表示内容選択',          
          'machine' => 'common',    
          'first_estimate' => 1                            
        ]); 
        CheckItem::create([
          'checkitem' => 'リンク指定',          
          'machine' => 'common',    
          'first_estimate' => 1                            
        ]); 
        
        
    }
}
