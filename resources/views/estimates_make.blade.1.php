<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
<body>
<div class="card-body"> 
<form action="{{ url('estimates_create') }}" method="POST" target="_blank" class="form-horizontal">
         {{ csrf_field() }}
<table class="table table-striped task-table" style="width: 1300px;">
 <thead>
  <tr>
   <td class="item_box_lock">項目</td>
   <td class="machine_box_lock"></td>  
 <td class="checkposition create_table">
    <div class="chkbox_ja">
    	<input type="checkbox" name="ja[1]" value="1" id="ja-on-select" onchange="change_ja()"/>
    	<label for="ja-on-select"></label>   	
    </div>
 </td> 
   <td class="machine_box_lock"></td>
   <td class="machine_box_lock"></td>
   <td class="machine_box_lock"></td>
 <td class="checkposition create_table">
    <div class="chkbox_eng">
    	<input type="checkbox" name="eng[1]" value="1" id="eng-on-select" onchange="change_eng()"/>
    	<label for="eng-on-select"></label>   	
    </div>
 </td> 
<!--
   <td class="lang_box_lock"></td> 
   <td class="lang_box_lock"></td>     
-->   
  </tr>
 </thead>
 <tbody>


                                
@foreach ($checkitems as $checkitem)     
 <tr>
 @if ($checkitem->id == 1) <!-- 運用期間入力フォーム -->
  <td>
  <div>{{ $checkitem->checkitem }}期間
   　<input type="number" id="period" name="period" value="2" min="2" style="width: 50px";>ヶ月
   　<input type="date" id="date1" name="date1" max="<?php echo date('Y-m-d'); ?>" style="width: 120px";>～<input type="date" id="date2" name="date2" max="<?php echo date('Y-m-d'); ?>" style="width: 120px";>
  </div>
  </td>
 @elseif ($checkitem->id == 3) <!-- 外字マップメンテナンス文字数 -->
  <td>
  <div>{{ $checkitem->checkitem }}：<input type="number" id="external_characters" name="external_characters" value="1" min="1" style="width: 50px";>式<br>
  </div>
  </td> 
 @elseif ($checkitem->id == 5) <!-- 個別調整件数 -->
  <td>
  <div>{{ $checkitem->checkitem }}：<input type="number" id="individual" name="individual" value="1" min="1" style="width: 50px";>式<br>
  </div>
  </td> 
 @elseif ($checkitem->id == 53) <!-- セッションフィルター件数 -->
  <td>
  <div>{{ $checkitem->checkitem }}
   　<br>セッションフィルター 件数：<input type="number" id="sessfilter" name="sessfilter" value="0" min="0" style="width: 50px";>件<br>
   認証無しリンク指定 　件数：<input type="number" id="link" name="link" value="0" min="0" style="width: 50px";>件
  </div>
  </td>  
 @else
  <td class="create_table">
  <div class="chkbox_lang">{{ $checkitem->checkitem }}
  </div>
  </td>  
 @endif 
  
 @if ($checkitem->id == 1) <!-- チェックボタン -->
<!--  <td><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 id="web-on-select" onchange="change_web()"></td> -->
  <td class="checkposition create_table">
   <div class="chkbox_web">
   	<input type="checkbox" name="web[{{ $checkitem->id }}]" value="1" id="web-on-select" onchange="change_web()"/>
   	<label for="web-on-select"></label>
   </div>
  </td>
  <td class="checkposition create_table"></td>
  <td class="checkposition create_table">
   <div class="chkbox_app">
   	<input type="checkbox" name="app[{{ $checkitem->id }}]" value="1" id="app-on-select" onchange="change_app()"/>
   	<label for="app-on-select"></label>
   </div>
  </td>
  
  <!-- 英語版チェック -->
  <td class="checkposition create_table"></td>
  <td class="checkposition create_table">
   <div class="chkbox_web_eng">
   	<input type="checkbox" name="web[{{ $checkitem->id }}]" value="1" id="web-on-select-eng" onchange="change_web_eng()"/>
   	<label for="web-on-select-eng"></label>
   </div>
  </td>
  <td class="checkposition create_table"></td>
  <td class="checkposition create_table">
   <div class="chkbox_app_eng">
   	<input type="checkbox" name="app[{{ $checkitem->id }}]" value="1" id="app-on-select-eng" onchange="change_app_eng()"/>
   	<label for="app-on-select-eng"></label>
   </div>
  </td>
  

 @else
  @if ($checkitem->machine == "common")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="common[{{ $checkitem->id }}]" value=1></td>
                                         <input type="hidden" name="ja[{{ $checkitem->id }}]" value=1 checked class="ja-select" disabled></td>
  <td class="create_table"></td>
  
  <!-- 英語版チェックボックス -->
  <td class="create_table"></td>
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="common[{{ $checkitem->id }}]" value=1></td>
                                         <input type="hidden" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select" disabled></td>
  <td class="create_table"></td>
  @elseif ($checkitem->machine == "web")
   @if ($checkitem->id == 21) <!-- 各種ご案内調整 -->
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select2" disabled></td>
                                          <input type="hidden" name="ja[{{ $checkitem->id }}]" value=1 checked class="ja-select" disabled></td>
   <td class="create_table"></td>
   
  <!-- 英語版チェックボックス -->
   <td class="create_table"></td>
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select2-eng" disabled></td>
                                          <input type="hidden" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select" disabled></td>
   <td class="create_table"></td>
   
   @else
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select" disabled></td>
                                          <input type="hidden" name="ja[{{ $checkitem->id }}]" value=1 checked class="ja-select" disabled></td>
   <td class="create_table"></td>
   
  <!-- 英語版チェックボックス -->
   <td class="create_table"></td>
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select-eng" disabled></td>
                                          <input type="hidden" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select" disabled></td>
   <td class="create_table"></td>
  
   @endif
  @elseif ($checkitem->machine == "app")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select" disabled></td>
                                         <input type="hidden" name="ja[{{ $checkitem->id }}]" value=1 checked class="ja-select" disabled></td>
  <td class="create_table"></td>
  
  <!-- 英語版チェックボックス -->
  <td class="create_table"></td>
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select-eng" disabled></td>
                                         <input type="hidden" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select" disabled></td>
  <td class="create_table"></td>
  
  @else
  <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select" disabled>
                                         <input type="hidden" name="ja[{{ $checkitem->id }}]" value=1 checked class="ja-select" disabled></td>
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select" disabled></td>
                                         <input type="hidden" name="ja[{{ $checkitem->id }}]" value=1 checked class="ja-select" disabled></td>

  <!-- 英語版チェックボックス -->
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select-eng" disabled>
                                         <input type="hidden" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select-eng" disabled></td>
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select-eng" disabled></td>
                                         <input type="hidden" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select" disabled></td>
  @endif
<!--  <td class="checkposition create_table"><input type="checkbox" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select" disabled></td>-->
 @endif  
 
 </tr>     
@endforeach
             <!-- 作成ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-11">
                     <button type="submit" class="btn btn-primary">
                         作成
                     </button>
                 </div>
             </div>
         </form>    
</div>
</body>
<!-- チェックボックス有効化・無効化判定 -->
<script>
function change_web() {
    var element;
    var element2; //各種ご案内（web版のみ場合有効化）の調整
    if((document.getElementById("web-on-select").checked) && (document.getElementById("app-on-select").checked)){
        element = document.getElementsByClassName("web-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
    }else if(document.getElementById("web-on-select").checked) {
        element = document.getElementsByClassName("web-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
        element2 = document.getElementsByClassName("web-select2");
        element2 = Array.from(element2);
        element2.forEach(function(element2) {
        element2.disabled = false;
        });
    }else {
        element = document.getElementsByClassName("web-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
        element2 = document.getElementsByClassName("web-select2");
        element2 = Array.from(element2);
        element2.forEach(function(element2) {
        element2.disabled = true;
        });
    }
}
function change_app() {
    var element;
    var element2;
    if((document.getElementById("web-on-select").checked) && (document.getElementById("app-on-select").checked)){
        element = document.getElementsByClassName("app-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
        element2 = document.getElementsByClassName("web-select2");
        element2 = Array.from(element2);
        element2.forEach(function(element2) {
        element2.disabled = true;
        });
    }else if(document.getElementById("app-on-select").checked) {
        element = document.getElementsByClassName("app-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        }); 
    }else {
        element = document.getElementsByClassName("app-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
        if (document.getElementById("web-on-select").checked) {
         element2 = document.getElementsByClassName("web-select2");
         element2 = Array.from(element2);
         element2.forEach(function(element2) {
         element2.disabled = false;
         });
        }
    }
}
function change_ja() {
    var element;
    if(document.getElementById("ja-on-select").checked) {
        element = document.getElementsByClassName("ja-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
    }else {
        element = document.getElementsByClassName("ja-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
    }
}
function change_eng() {
    var element;
    if(document.getElementById("eng-on-select").checked) {
        element = document.getElementsByClassName("eng-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
    }else {
        element = document.getElementsByClassName("eng-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
    }
}

//英語版
function change_web_eng() {
    var element;
    var element2; //各種ご案内（web版のみ場合有効化）の調整
    if((document.getElementById("web-on-select-eng").checked) && (document.getElementById("app-on-select-eng").checked)){
        element = document.getElementsByClassName("web-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
    }else if(document.getElementById("web-on-select-eng").checked) {
        element = document.getElementsByClassName("web-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
        element2 = document.getElementsByClassName("web-select2-eng");
        element2 = Array.from(element2);
        element2.forEach(function(element2) {
        element2.disabled = false;
        });
    }else {
        element = document.getElementsByClassName("web-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
        element2 = document.getElementsByClassName("web-select2-eng");
        element2 = Array.from(element2);
        element2.forEach(function(element2) {
        element2.disabled = true;
        });
    }
}

function change_app_eng() {
    var element;
    var element2;
    if((document.getElementById("web-on-select-eng").checked) && (document.getElementById("app-on-select-eng").checked)){
        element = document.getElementsByClassName("app-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
        element2 = document.getElementsByClassName("web-select2-eng");
        element2 = Array.from(element2);
        element2.forEach(function(element2) {
        element2.disabled = true;
        });
    }else if(document.getElementById("app-on-select-eng").checked) {
        element = document.getElementsByClassName("app-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        }); 
    }else {
        element = document.getElementsByClassName("app-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
        if (document.getElementById("web-on-select-eng").checked) {
         element2 = document.getElementsByClassName("web-select2-eng");
         element2 = Array.from(element2);
         element2.forEach(function(element2) {
         element2.disabled = false;
         });
        }
    }
}
</script>

@endsection
