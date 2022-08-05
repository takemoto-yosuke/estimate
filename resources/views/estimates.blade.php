<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     
         <form action="{{ url('estimate') }}" method="POST" class="form-horizontal">
         {{ csrf_field() }}
   
     
     <div class="card-body">
         <div class="l_box">
          <div class="category_box">
           カテゴリー
             <div class="form-group">
                 <div class="col-sm-11">
                  <select type="category_id" name="category_id" class="form-control">
                  @foreach ($categories as $category) 
                  <option value={{ $category->id }}>{{ $category->category }}</option>
                  @endforeach
                  </select>                      
                 </div>        
             </div>           
          </div>
          <div class="item_box">
           項目
             <div class="form-group">
                 <div class="col-sm-11">
                     <input type="item" name="item" class="form-control">
                 </div>
             </div>            
          </div>
          <div class="content_box">
           内容
             <div class="form-group">
                 <div class="col-sm-11">
                     <input type="content" name="content" class="form-control">
                 </div>
             </div>            
          </div>
          <div class="quantity_box">
           数量
             <div class="form-group">
                 <div class="col-sm-11">
                     <input type="quantity" name="quantity" class="form-control">
                 </div>
             </div>            
          </div>
          <div class="unit_box">
           単位
             <div class="form-group">
                 <div class="col-sm-11">
                     <input type="unit" name="unit" class="form-control">
                 </div>
             </div>            
          </div>
          <div class="unit_prise_box">
           単価
             <div class="form-group">
                 <div class="col-sm-11">
                     <input type="unit_prise" name="unit_prise" class="form-control">
                 </div>
             </div>              
          </div>
          <div class="price_box">
           金額
             <div class="form-group">
                 <div class="col-sm-11">
                     <input type="prise" name="prise" class="form-control">
                 </div>
             </div>              
          </div>

          <div class="machine_both_box">
           端末
             <div class="form-group">
                 <div class="col-sm-11">
                  <select type="machine" name="machine" class="form-control">
                  <option name="web_only">ウェブのみ</option>
                  <option name="app_only">アプリのみ</option>
                  <option name="web">ウェブ含む</option>
                  <option name="app">アプリ含む</option>                  
                  <option name="machine_or">ウェブ or アプリ</option> 
                  <option name="machine_or2">or（両端末版有）</option>
                  <option name="machine_and">ウェブ and アプリ</option>
                  </select>                      
                 </div>
             </div>           
          </div>            
          <div class="lang_both_box">
           言語
             <div class="form-group">
                 <div class="col-sm-11">
                  <select type="lang" name="lang" class="form-control">
                  <option name="ja_only">日本語のみ</option>
                  <option name="en_only">英語のみ</option>
                  <option name="ja">日本語含む</option>
                  <option name="en">英語含む</option>                  
                  <option name="lang_or">日本語 or 英語</option>  
                  <option name="lang_or2">or（日英版有）</option>
                  <option name="lang_and">日本語 and 英語</option>
                  </select>                     
                 </div>
             </div>           
          </div>  
          <div class="lang_both_box">
           チェック項目
             <div class="form-group">
                 <div class="col-sm-11">
                  <select type="checkitem_id" name="checkitem_id" class="form-control">
                  @foreach ($checkitems as $checkitem) 
                  <option value={{ $checkitem->id }}>{{ $checkitem->checkitem }}</option>
                  @endforeach
                  </select>                      
                 </div>        
             </div>           
          </div>          
          
     </div>
     
             <!-- 本 登録ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-11">
                     <button type="submit" class="btn btn-primary">
                         Save
                     </button>
                 </div>
             </div>
         </form>       

<?php
 $system_reset_flag = 1;
 $web_reset_flag = 1;
 $app_reset_flag = 1;
 $option_reset_flag = 1;
 $customize_reset_flag = 1;
 $etc_reset_flag = 1;
 $update_reset_flag = 1;
 $container_reset_flag = 1;
 $web_flag = 0; 
 $app_flag = 0;
 $option_flag = 0;
 $customize_flag = 0; 
?> 
        
<table class="table table-striped task-table">
 <thead>
  <tr>
   <td class="category_box">カテゴリー</td>
   <td class="item_box">項目</td>
   <td class="content_box">内容</td>
   <td class="quantity_box">数量</td>
   <td class="unit_box">単位</td>
   <td class="unit_prise_box">単価</td>
   <td class="price_box">金額</td>
   <td class="machine_both_box">端末</td>
   <td class="lang_both_box">言語</td>                       
  </tr>
 </thead>
 <tbody>
                                
@foreach ($estimates as $estimate)     
 <tr>
  <td class="table-text">
           @if ($estimate->category_id == 1 && $system_reset_flag == 1)
            <?php $system_reset_flag = 0?>
            システム基本設定   <!-- DB読み込みに修正予定 -->
           @elseif ($estimate->category_id == 2 && $web_reset_flag == 1)
            <?php $web_reset_flag = 0?>
            ウェブ   
           @elseif ($estimate->category_id == 3 && $app_reset_flag == 1)
            <?php $app_reset_flag = 0?>
            アプリ  
           @elseif ($estimate->category_id == 4 && $option_reset_flag == 1)
            <?php $option_reset_flag = 0?>
            オプション    
           @elseif ($estimate->category_id == 5 && $customize_reset_flag == 1)
            <?php $customize_reset_flag = 0?>
            カスタマイズ    
           @elseif ($estimate->category_id == 6 && $etc_reset_flag == 1)
            <?php $etc_reset_flag = 0?>
            その他    
           @elseif ($estimate->category_id == 7 && $update_reset_flag == 1)
            <?php $update_reset_flag = 0?>
            データ更新    
           @elseif ($estimate->category_id == 8 && $container_reset_flag == 1)
            <?php $container_reset_flag = 0?>
            コンテナOSメンテ              
           @endif           
  </td>
  <td>{{ $estimate->item }}</td>
  <td>{{ $estimate->content }}</td>
  <td>{{ $estimate->quantity }}</td>
  <td>{{ $estimate->unit }}</td>
  <td>{{ $estimate->unit_prise }}</td>
  <td>{{ $estimate->prise }}</td>
  <td>
   @if ($estimate->web_flag == 1 && $estimate->app_flag == 0) {{"ウェブのみ"}}
   @elseif ($estimate->web_flag == 0 && $estimate->app_flag == 1) {{"アプリのみ"}}
   @elseif ($estimate->web_flag == 1) {{"ウェブ含む"}}
   @elseif ($estimate->app_flag == 1) {{"アプリ含む"}}
   @elseif ($estimate->machine_both == 2) {{"ウェブ or アプリ"}}
   @elseif ($estimate->machine_both == 3) {{"or（両端末版有）"}}
   @elseif ($estimate->machine_both == 1) {{"ウェブ and アプリ"}}           
   @endif
  </td>
  <td>
   @if ($estimate->ja_flag == 1 && $estimate->eng_flag == 0) {{"日本語のみ"}}
   @elseif ($estimate->ja_flag == 0 && $estimate->eng_flag == 1) {{"英語のみ"}}
   @elseif ($estimate->ja_flag == 1) {{"日本語含む"}}
   @elseif ($estimate->eng_flag == 1) {{"英語含む"}}
   @elseif ($estimate->lang_both == 2) {{"日本語 or 英語"}}
   @elseif ($estimate->lang_both == 3) {{"or（日英版有）"}}
   @elseif ($estimate->lang_both == 1) {{"日本語 and 英語"}}  
   @endif           
  </td>
  
                                 <td> 			        
                                     <form action="{{ url('estimate/'.$estimate->id) }}" method="POST">
                                             {{ csrf_field() }}
                                             {{ method_field('DELETE') }}
                                             <button type="submit" class="btn btn-danger">
                                                 削除
                                             </button>
                                     </form> 			        
                                 </td>
                                 <td>
                                	    <form action="{{ url('estimate/'.$estimate->id.'/edit') }}" method="GET"> 
                                	            {{ csrf_field() }}
                                	            <button type="submit" class="btn btn-primary">更新 </button>
                                	    </form>
                                 </td>    
  
 </tr>     
@endforeach
 </tbody>
</table>    
@endsection