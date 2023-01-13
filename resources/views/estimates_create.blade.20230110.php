<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app_create')
 @section('content')

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

<div class="card-body">         
<table class="table table-striped task-table">
 <!--
 <thead>
  <tr>
   <td class="category_box">カテゴリー</td>
   <td class="item_box">項目</td>
   <td style="width: 0%;"></td>
   <td class="content_box">内容</td>
   <td style="width: 0%;"></td>
   <td class="quantity_box">数量</td>
   <td class="unit_box">単位</td>
   <td class="unit_prise_box">単価</td>
   <td class="price_box">金額</td>                     
  </tr>
 </thead>
 -->
 <tbody>   

@foreach ($checkitems as $checkitem)						
	@foreach ($estimates as $estimate)					
		@if ($checkitem->id == $estimate->checkitem_id)	 {{--チェック項目と一致する見積項目を照合--}}
		    <?php
			    $machine_flag = 0;			
			    $lang_flag = 0;			
			?>
			<!--
			@if (isset($display->web[$checkitem->id]) == true)
			{{ $display->web[$checkitem->id] }}
			@endif
-->
		
			@switch($display)
				@case(isset($display->web[$checkitem->id]) && !isset($display->app[$checkitem->id]))	 {{--チェックボックス web有・app無--}}
					@if($estimate->machine == "web_include" || $estimate->machine == "web|app" || $estimate->machine == "web|&app" || $estimate->machine == "web_only")	
						<?php $machine_flag = 1; ?>
					@endif	
					@break	
				@case(!isset($display->web[$checkitem->id]) && isset($display->app[$checkitem->id]))	 {{--チェックボックス web無・app有--}}	
					@if($estimate->machine == "app_include" || $estimate->machine == "web|app" || $estimate->machine == "web|&app" || $estimate->machine == "app_only")	
						<?php $machine_flag = 1; ?>
					@endif	
					@break					
				@case(isset($display->web[$checkitem->id]) && isset($display->app[$checkitem->id]))	 {{--チェックボックス web有・app有--}}		
					@if($estimate->machine == "web&app" || $estimate->machine == "web|app" || $estimate->machine == "web|&app" || $estimate->machine == "web_include" || $estimate->machine == "app_include")	
						<?php $machine_flag = 1; ?>
					@endif	
					@break	
				@case(isset($display->common[$checkitem->id]))	 {{--チェックボックス 共通有--}}		
					@if($estimate->machine == "web|app")	
						<?php $machine_flag = 1; ?>
					@endif	
					@break	
				@default
				
			@endswitch			
			@switch($display)			
				@case(isset($display->ja[$checkitem->id]) && !isset($display->eng[$checkitem->id]))	 {{--チェックボックス 日有・英無--}}			
					@if($estimate->lang == "ja_include" || $estimate->lang == "ja|eng" || $estimate->lang == "ja|&eng")		
						<?php $lang_flag = 1; ?>
					@endif	
					@break	
				@case(!isset($display->ja[$checkitem->id]) && isset($display->eng[$checkitem->id]))	 {{--チェックボックス 日無・英有--}}	
					@if($estimate->lang == "eng_include" || $estimate->lang == "ja|eng" || $estimate->lang == "ja|&eng")			
						<?php $lang_flag = 1; ?>
					@endif	
					@break	
				@case(isset($display->ja[$checkitem->id]) && isset($display->eng[$checkitem->id]))	 {{--チェックボックス 日有・英有--}}
					@if($estimate->lang == "ja|eng" || $estimate->lang == "ja&eng" || $estimate->lang == "ja_include" || $estimate->lang == "eng_include")		
						<?php $lang_flag = 1; ?>
					@endif	
					@break					
				@default		
			@endswitch			
			@if($machine_flag == 1 && $lang_flag == 1)			
			
  @if (($estimate->category_id == 2 && $web_reset_flag == 1) || 
  ($estimate->category_id == 3 && $app_reset_flag == 1) || 
  ($estimate->category_id == 4 && $option_reset_flag == 1) || 
  ($estimate->category_id == 5 && $customize_reset_flag == 1) || 
  ($estimate->category_id == 6 && $etc_reset_flag == 1) || 
  ($estimate->category_id == 7 && $update_reset_flag == 1) || 
  ($estimate->category_id == 8 && $container_reset_flag == 1))
   <tr>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   </tr>
  @endif			
			
 <tr>
  <td class="table-text">
           @if ($estimate->category_id == 1 && $system_reset_flag == 1)
            <?php $system_reset_flag = 0?>
            システム基本設定   
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
  <td style="width: 0%;"></td>
  <td>{{ $estimate->content }}</td>
  <td style="width: 0%;"></td>
  <td>{{ $estimate->quantity }}</td>
  <td>{{ $estimate->unit }}</td>
  <td>{{ $estimate->unit_prise }}</td>
  <td>{{ $estimate->prise }}</td>
 </tr> 			
</div>			
			
			@endif
		@endif				
	@endforeach					
@endforeach						
@endsection