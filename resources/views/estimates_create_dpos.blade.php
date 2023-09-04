
<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app_create')
 @section('content')

<div class="card-body">         
<table>
 <tbody>   

<?php

estimate_item($estimates, $categories);

function estimate_item($estimates, $categories) {
 $category_flg = 0;
 $category_name = "";
 $old_category_id = 0;
 
	 foreach ($estimates as $estimate){
 	 if (in_array($estimate->id, [1, 4, 5, 6, 40, 62])){

    foreach ($categories as $category){
 	   if($category->id == $estimate->category_id){
  	   $category_name = $category->category; 	 
 	   }
  	 }
  	 
  	 if($estimate->category_id == $old_category_id){
     $category_name = "";
     $category_flg = 1;
  	 }
  	 else{
     $category_flg = 0;  	 
  	 }
    $old_category_id = $estimate->category_id;
  	 
 	  
 	  if($category_flg == 0){
      echo '<tr style="border-bottom: 1px dotted black;">';
      echo '<td></td>';
      echo '</tr>'; 	  
 	  }
 	 
      echo '<tr style="border-bottom: 1px dotted black;">';
      echo '<td class="table-text">';
      echo $category_name;      
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

?>

@endsection