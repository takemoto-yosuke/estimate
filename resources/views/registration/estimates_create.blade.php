
<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app_create')
 @section('content')

<div class="card-body">         
<table>
 <tbody>   

<?php

estimate_item($checkitems, $estimates, $display, 1, "基本システム設置・設定");
estimate_item($checkitems, $estimates, $display, 2, "オプション");
estimate_item($checkitems, $estimates, $display, 3, "複数言語対応（日英バイリンガル版）");
estimate_item($checkitems, $estimates, $display, 4, "WebAPI関連");

function estimate_item($checkitems, $estimates, $display, $category_id, $category_name) {
 $reset_flag = 1;
 foreach ($checkitems as $checkitem){
	 foreach ($estimates as $estimate){
 	 if ($estimate->category_id != $category_id){
 	  continue;
  	} 	 
	  if ($checkitem->id == $estimate->checkitem_id){	 //チェック項目と一致する見積項目を照合
	   if(isset($display->check[$checkitem->id])){
	    if ($reset_flag == 1){
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
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
    	 echo "<td style='padding-left: 20px;'> $estimate->content </td>";
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
      echo '<td style="width: 0%;"></td>';
      echo "<td style='padding-left: 20px;'> $estimate->quantity </td>";
      echo "<td style='padding-left: 20px;'> $estimate->unit </td>";
      echo "<td style='padding-left: 20px;'> $estimate->unit_prise </td>";
      echo "<td style='padding-left: 20px;'> $estimate->prise </td>";  
      echo "</tr>";
     }
     echo '</div>';				
    }
   }
	 }					
 }		
}
?>

@endsection