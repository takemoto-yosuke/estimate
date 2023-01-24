
<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app_create')
 @section('content')

<div class="card-body">         
<table>
 <tbody>   
     <tr style="border-bottom: 1px dotted black;">
     <td></td>
     <td style="padding-left: 20px;">項目</td>
     <td></td>
     <td style="padding-left: 20px;">内容</td>
     <td></td>
     <td style="padding-left: 20px;">数量</td>
     <td></td>
     <td style="padding-left: 20px;">単価</td>
     <td style="padding-left: 20px;">金額</td>
     </tr>
@php
$price = 0;
$price += estimate_item($checkitems, $estimates, $display, 1, "システム基本設定");
$price += estimate_item($checkitems, $estimates, $display, 2, "ウェブ");
$price += estimate_item($checkitems, $estimates, $display, 3, "アプリ");
$price += estimate_item($checkitems, $estimates, $display, 4, "オプション");
$price += estimate_item($checkitems, $estimates, $display, 5, "カスタマイズ");
$price += estimate_item($checkitems, $estimates, $display, 6, "その他");
$price += estimate_item($checkitems, $estimates, $display, 7, "データ更新");
$price += estimate_item($checkitems, $estimates, $display, 8, "コンテナOSメンテ");
$sum_price = $price + ($price * 0.1);

echo "<p style='font-weight: bold;'>御見積金額 ￥".$sum_price."（税込）</p>";
@endphp

<?php
function estimate_item($checkitems, $estimates, $display, $category_id, $category_name) {
 $reset_flag = 1;
 $web_flag = 0; 
 $app_flag = 0;
 $option_flag = 0;
 $customize_flag = 0;
 $sum_price = 0;
foreach ($checkitems as $checkitem){
	foreach ($estimates as $estimate){
	if ($estimate->category_id != $category_id){
	 continue;
	} 
	if ($checkitem->id == $estimate->checkitem_id){	 //チェック項目と一致する見積項目を照合
			    $machine_flag = 0;			
			    $lang_flag = 0;			

			switch($display){
				case (isset($display->web[$checkitem->id]) && !isset($display->app[$checkitem->id])):	 //チェックボックス web有・app無
					if($estimate->machine == "web_include" || $estimate->machine == "web|app" || $estimate->machine == "web|&app" || $estimate->machine == "web_only"){
						$machine_flag = 1;
					}	
					break;	
				case(!isset($display->web[$checkitem->id]) && isset($display->app[$checkitem->id])):	 //チェックボックス web無・app有
					if($estimate->machine == "app_include" || $estimate->machine == "web|app" || $estimate->machine == "web|&app" || $estimate->machine == "app_only"){
						$machine_flag = 1;
					}	
					break;					
				case(isset($display->web[$checkitem->id]) && isset($display->app[$checkitem->id])):	 //チェックボックス web有・app有	
					if($estimate->machine == "web&app" || $estimate->machine == "web|app" || $estimate->machine == "web|&app" || $estimate->machine == "web_include" || $estimate->machine == "app_include"){
						$machine_flag = 1;
					}	
					break;	
				case(isset($display->common[$checkitem->id])):	 //チェックボックス 共通有
					if($estimate->machine == "web|app"){	
						$machine_flag = 1;
					}	
					break;	
				default:
			}			
			switch($display){			
				case(isset($display->ja[$checkitem->id]) && !isset($display->eng[$checkitem->id])):	 //チェックボックス 日有・英無			
					if($estimate->lang == "ja_include" || $estimate->lang == "ja|eng" || $estimate->lang == "ja|&eng"){		
						$lang_flag = 1;
					}	
					break;	
				case(!isset($display->ja[$checkitem->id]) && isset($display->eng[$checkitem->id])):	 //チェックボックス 日無・英有
					if($estimate->lang == "eng_include" || $estimate->lang == "ja|eng" || $estimate->lang == "ja|&eng"){			
						$lang_flag = 1;
					}	
					break;	
				case(isset($display->ja[$checkitem->id]) && isset($display->eng[$checkitem->id])):	 //チェックボックス 日有・英有
					if($estimate->lang == "ja|eng" || $estimate->lang == "ja&eng" || $estimate->lang == "ja_include" || $estimate->lang == "eng_include"){		
						$lang_flag = 1;
					}	
					break;					
				default:		
			}			
			if($machine_flag == 1 && $lang_flag == 1){			
    if (($reset_flag == 1)){
     echo '<tr style="border-bottom: 1px dotted black;">';
     echo '<td></td>';
     echo '<td></td>';
     echo '<td></td>';
     echo '<td></td>';
     echo '<td></td>';
     echo '<td></td>';
     echo '<td></td>';
     echo '<td></td>';
     echo '<td></td>';
     echo '</tr>';
    }		
    if ($estimate->category_id == $category_id){
     echo '<tr style="border-bottom: 1px dotted black;">';
     echo '<td class="table-text">';
     if ($reset_flag == 1){
      $reset_flag = 0;
      echo $category_name;         
     }           
     echo '</td>';
     echo "<td style='padding-left: 20px;'> $estimate->item </td>";
     echo '<td style="width: 0%;"></td>';
     echo "<td style='padding-left: 20px;'> $estimate->content </td>";
     echo '<td style="width: 0%;"></td>';
     echo "<td style='padding-left: 20px;'> $estimate->quantity </td>";
     echo "<td style='padding-left: 20px;'> $estimate->unit </td>";
     echo "<td style='padding-left: 20px;'> $estimate->unit_prise </td>";
     echo "<td style='padding-left: 20px;'> $estimate->prise </td>";
     echo "</tr>";
     $sum_price += $estimate->prise;
    } 
    echo '</div>';			
			}
		}				
	}					
}		
$reset_flag = 1;
return $sum_price;
}
?>
@endsection