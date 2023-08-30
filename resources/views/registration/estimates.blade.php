<link href="/css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     
         <form action="{{ url('registration/estimate') }}" method="POST" class="form-horizontal">
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
          <div class="content_box_regi">
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


          
          <div class="lang_both_box_regi">
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
                         登録
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
        
<table id="sortable-table" class="table table-striped task-table">
 <thead>
  <tr>
   <td class="category_box">カテゴリー</td>
   <td class="content_box_regi">内容</td>
   <td class="quantity_box">数量</td>
   <td class="unit_box">単位</td>
   <td class="unit_prise_box">単価</td>
   <td class="price_box">金額</td>
   <td class="check_item_box_regi">チェック項目</td>                       
  </tr>
 </thead>
 <tbody>
                                
@foreach ($estimates as $estimate)     
 <tr data-id="{{ $estimate->id }}">
  <td class="table-text category-{{ $estimate->category_id }}">
           @if ($estimate->category_id == 1 && $system_reset_flag == 1)
            <?php $system_reset_flag = 0?>
            基本システム設置・設定   <!-- DB読み込みに修正予定 -->
           @elseif ($estimate->category_id == 2 && $web_reset_flag == 1)
            <?php $web_reset_flag = 0?>
            オプション   
           @elseif ($estimate->category_id == 3 && $app_reset_flag == 1)
            <?php $app_reset_flag = 0?>
            複数言語対応（日英バイリンガル版）  
           @elseif ($estimate->category_id == 4 && $option_reset_flag == 1)
            <?php $option_reset_flag = 0?>
            WebAPI関連                
           @endif           
  </td>
  <td>{{ $estimate->content }}</td>
  <td>{{ $estimate->quantity }}</td>
  <td>{{ $estimate->unit }}</td>
  <td>{{ $estimate->unit_prise }}</td>
  <td>{{ $estimate->prise }}</td>
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
                                     <form action="{{ url('registration/estimate/'.$estimate->id) }}" method="POST" onsubmit="return confirmDelete()">
                                             {{ csrf_field() }}
                                             {{ method_field('DELETE') }}
                                             <button type="submit" class="btn btn-danger">
                                                 削除
                                             </button>
                                     </form> 			        
                                 </td>
                                 <td>
                                	    <form action="{{ url('registration/estimate/'.$estimate->id.'/edit') }}" method="GET"> 
                                	            {{ csrf_field() }}
                                	            <button type="submit" class="btn btn-primary">更新 </button>
                                	    </form>
                                 </td>    
  
 </tr>     
@endforeach
 </tbody>
</table>    
    <!-- 並び順を保存するボタン -->
    <div class="card-body">
        <form action="{{ url('registration/save-order-estimate') }}" method="POST" id="save-order-form">
            {{ csrf_field() }}
            @method('PUT')
            <input type="hidden" name="order" id="order-input">
            <button type="submit" class="btn btn-primary">並び順保存</button>
        </form>
    </div>
    
<!-- SortableJSのライブラリを読み込む -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<!-- テーブルのドラッグアンドドロップを有効化 -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sortableTable = new Sortable(document.getElementById('sortable-table').getElementsByTagName('tbody')[0], {
            animation: 150,
        });

        const saveOrderForm = document.getElementById('save-order-form');
        const orderInput = document.getElementById('order-input');

        // 保存ボタンがクリックされたら並び順をinputに設定してフォームを送信
        saveOrderForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const orderedIds = Array.from(document.querySelectorAll('#sortable-table tbody tr')).map(tr => tr.dataset.id);
            orderInput.value = JSON.stringify(orderedIds);
            saveOrderForm.submit();
        });
    });
</script>
<script>
    function confirmDelete() {
        return confirm("本当に削除してもよろしいですか？");
    }
</script>
@endsection