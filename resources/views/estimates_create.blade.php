
<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app_create')
 @section('content')

<div class="card-body">         
<table>
 <tbody>   

<?php
/* 為替取得  */
$url = "https://www.gaitameonline.com/rateaj/getrate";
$content = file_get_contents($url);
$data = json_decode($content, true);
if (empty($data)) {return;} 
else {
 foreach($data as $row) {
  foreach($row as $r) {
   if ($r["currencyPairCode"] == "USDJPY"){
    $dollar = $r["open"]; //始値
	}	
  }
 }
}
/* 為替取得  */
switch($dollar){
	case($dollar < 115):
		$raito = 0;
		$dollaryen = "～115";
		break;
	case(($dollar >= 115) && ($dollar < 127)):
		$raito = 10;
		$dollaryen = "115～126";
		break;
	case(($dollar >= 127) && ($dollar < 133)):
		$raito = 15;
		$dollaryen = "127～132";
		break;
	case(($dollar >= 133) && ($dollar < 139)):
		$raito = 20;
		$dollaryen = "133～138";
		break;
	case(($dollar >= 139) && ($dollar < 145)):
		$raito = 25;
		$dollaryen = "139～144";
		break;
	case(($dollar >= 145) && ($dollar < 151)):
		$raito = 30;
		$dollaryen = "145～150";
		break;
	case($dollar >= 151):
		$raito = "（要問合せ）";
		$dollaryen = "151～";
		break;		
	default:
		$raito = 1;
		$dollaryen = "1";
}

estimate_item($checkitems, $estimates, $display, 1, "システム基本設定", null, null);
estimate_item($checkitems, $estimates, $display, 2, "ウェブ", $raito, $dollaryen);
estimate_item($checkitems, $estimates, $display, 3, "アプリ", null, null);
estimate_item($checkitems, $estimates, $display, 4, "オプション", null, null);
estimate_item($checkitems, $estimates, $display, 5, "カスタマイズ", null, null);
estimate_item($checkitems, $estimates, $display, 6, "その他", null, null);
estimate_item($checkitems, $estimates, $display, 7, "データ更新", null, null);
estimate_item($checkitems, $estimates, $display, 8, "コンテナOSメンテ", null, null);
estimate_item($checkitems, $estimates, $display, 9, null, null, null);

function estimate_item($checkitems, $estimates, $display, $category_id, $category_name, $raito, $dollaryen) {
 $reset_flag = 1;
 $web_flag = 0; 
 $app_flag = 0;
 $option_flag = 0;
 $customize_flag = 0;
 $date = date("n月d日");
 $prise_raito = 0;
 
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
     echo '<td style="width: 0%;"></td>';

	/* 運用期間 */
     if ($estimate->id == 4){
      if ($_POST["period"] == null){$_POST["period"] = 2;} //空白の場合は2とする
        $estimate->content = $_POST["period"]."ヶ月間";
        $estimate->quantity = $_POST["period"];
    	$estimate->prise = $estimate->unit_prise * $_POST["period"];
    	$id4_unit_prise = $estimate->unit_prise;
    	$id4_quantity = $_POST["period"];
     }     
	/* 運用期間 */
	/* 為替調整費 */
     if ($estimate->id == 5){
      if (($_POST["date1"] == null) && ($_POST["date2"] == null)){
        $estimate->content = "為替相場調整費 ".$date."時点：基本価格の".$raito."％（1ドル".$dollaryen."円）";
        $estimate->quantity = $id4_quantity;
    	$estimate->unit_prise = $id4_unit_prise * $raito / 100;
    	$estimate->prise = $estimate->unit_prise * $id4_quantity;
	  }
/*      else { //公開期間の指定がある場合
        $date1 = substr($_POST["date1"], 5);
        $date1 = ltrim($date1, "0");
        $date1 = str_replace('-', '月', $date1);
        $date2 = substr($_POST["date2"], 5);
        $date2 = ltrim($date2, "0");
        $date2 = str_replace('-', '月', $date2);
	    if (substr($date1, -2, 1) == 0){
	     $date1 = substr_replace($date1, '', -2, 1);
	    }
	    if (substr($date2, -2, 1) == 0){
	     $date1 = substr_replace($date1, '', -2, 1);
	    }
        
        $estimate->content = "為替相場調整費 ".$date1."日（公開日）～".$date2."日の平均：基本価格の●●％（1ドル●●円）";
        $estimate->quantity = $id4_quantity;
    	$estimate->unit_prise = null;
    	$estimate->prise = null;
	  }	  */
      else { //公開期間の指定がある場合
        $date1 = substr($_POST["date1"], 5);
        $date1 = ltrim($date1, "0");
        $date1 = str_replace('-', '月', $date1);
        $date2 = substr($_POST["date2"], 5);
        $date2 = ltrim($date2, "0");
        $date2 = str_replace('-', '月', $date2);
        
        $estimate->content = "為替相場調整費 ".$date1."日（公開日）～".$date2."日の平均：基本価格の●●％（1ドル●●円）";
        $estimate->quantity = $id4_quantity;
    	$estimate->unit_prise = null;
    	$estimate->prise = null;
	  }	  
     }
	/* 為替調整費 */  
	
	/* 外字マップメンテナンス */
     if ($estimate->id == 114){
        $estimate->content = $_POST["external_characters"]."式";
        $estimate->quantity = $_POST["external_characters"];
    	$estimate->prise = $estimate->unit_prise * $estimate->quantity;
      }
	/* 外字マップメンテナンス */
	
	/* 個別調整 */
     if ($estimate->id == 116){
        $estimate->content = $_POST["individual"]."式";
        $estimate->quantity = $_POST["individual"];
    	$estimate->prise = $estimate->unit_prise * $estimate->quantity;
      }
	/* 個別調整 */

	/* ハイライトリンク件数 */
     if ($estimate->id == 145){
      if ($_POST["highlight"] > 0){
        $estimate->content = $_POST["highlight"]."件";
        $estimate->quantity = round($_POST["highlight"]/2)*0.1;
    	$estimate->prise = $estimate->unit_prise * $estimate->quantity;
      }   
     }
	/* ハイライトリンク件数 */
	
	/* 左メニューカスタマイズー */
     if ($estimate->id == 148){
      if ($_POST["sessfilter"] > 0){
        $estimate->content = "セッションフィルター".$_POST["sessfilter"]."件 ";
        $estimate->quantity = round($_POST["sessfilter"]/2)*0.1;
    	$estimate->prise = $estimate->unit_prise * $estimate->quantity;
      }
      if ($_POST["link"] > 0){
        $estimate->content = $estimate->content."認証無しリンク指定".$_POST["link"]."件";
        $estimate->quantity = $estimate->quantity + round($_POST["link"]/2)*0.1;
    	$estimate->prise = $estimate->unit_prise * $estimate->quantity;
      }      
     }
	/* 左メニューカスタマイズー */     
	 echo "<td style='padding-left: 20px;'> $estimate->content </td>";
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
$reset_flag = 1;
}
?>

@endsection