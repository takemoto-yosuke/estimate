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


          <div class="machine_both_box tooltip1">
           <p>端末</p>
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
             <p class="description">
              〇：必ず有り<br>
              ✕：必ず無し<br>
              △：どちらでもOK<br><br>
              ウェブのみ... ウェブ〇、アプリ✕ （アプリ有りになると金額が変わる）<br>
              アプリのみ... ウェブ✕、アプリ〇 （ウェブ有りになると金額が変わる）<br>
              ウェブ含む... ウェブ〇、アプリ△ （アプリ有りでも金額が変わらない）<br>
              アプリ含む... ウェブ△、アプリ〇 （ウェブ有りでも金額が変わらない）<br>
              ウェブ or アプリ... ウェブ△、アプリ△<br>
              or （両端末版有）... or と and の両パターンがあり、金額が変わる<br>
              ウェブ and アプリ... ウェブ〇、アプリ〇<br>
             </p>
             
          </div>            
          <div class="lang_both_box tooltip1">
           <p>言語</p>
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
             <p class="description">
              〇：必ず有り<br>
              ✕：必ず無し<br>
              △：どちらでもOK<br><br>
              日本語のみ... 日本語〇、英語✕ （英語有りになると金額が変わる）<br>
              英語のみ... 日本語✕、英語〇 （日本語有りになると金額が変わる）<br>
              日本語含む... 日本語〇、英語△ （英語有りでも金額が変わらない）<br>
              英語含む... 日本語△、英語〇 （日本語有りでも金額が変わらない）<br>
              日本語 or 英語... 日本語△、英語△<br>
              or （日英版有）... or と and の両パターンがあり、金額が変わる<br>
              日本語 and 英語... 日本語〇、英語〇<br>
             </p>             
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
   <td class="check_item_box">チェック項目</td>                       
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
   @if ($estimate->machine == "web_only") {{"ウェブのみ"}}
   @elseif ($estimate->machine == "app_only") {{"アプリのみ"}}
   @elseif ($estimate->machine == "web_include") {{"ウェブ含む"}}
   @elseif ($estimate->machine == "app_include") {{"アプリ含む"}}
   @elseif ($estimate->machine == "web|app") {{"ウェブ or アプリ"}}
   @elseif ($estimate->machine == "web&app") {{"ウェブ and アプリ"}}
   @elseif ($estimate->machine == "web|&app") {{"or（両端末版有）"}}           
   @endif
  </td>
  <td>
   @if ($estimate->lang == "ja_only") {{"日本語のみ"}}
   @elseif ($estimate->lang == "eng_only") {{"英語のみ"}}
   @elseif ($estimate->lang == "ja_include") {{"日本語含む"}}
   @elseif ($estimate->lang == "eng_include") {{"英語含む"}}
   @elseif ($estimate->lang == "ja|eng") {{"日本語 or 英語"}}
   @elseif ($estimate->lang == "ja&eng") {{"日本語 and 英語"}}
   @elseif ($estimate->lang == "ja|&eng") {{"or（日英版有）"}}  
   @endif           
  </td>
   @php
   /* チェック項目取得 */
    $checkitem_name = $checkitems->where('id',$estimate->checkitem_id)->first();
   @endphp
   @if ($checkitem_name != null)
   <td>{{ $checkitem_name->checkitem }}</td>
   @else
   <td></td>
   @endif
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