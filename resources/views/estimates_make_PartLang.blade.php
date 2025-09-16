<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
<body>
<div class="card-body"> 
<form action="{{ url('estimates_create_PartLang') }}" method="POST" target="_blank" class="form-horizontal" onsubmit="return validateForm();">
         {{ csrf_field() }}
<table class="table table-striped task-table" style="width: 900px;">
 <thead>
  <tr>
   <td class="item_box_lock">項目</td>
   <td class="machine_box_lock"></td>  
   <td class="machine_box_lock"></td>  
   <td class="machine_box_lock"></td>
   <td class="machine_box_lock"></td>
   <td class="machine_box_lock"></td>
   <td class="machine_box_lock tooltip1" style="display: unset; color: red; font-weight: bold;">注意
             <p class="description">
              「日本語：無、英語：有」のチェックパターンだと見積項目が作成されない。<br>
              もしこのパターンの運用がある場合は、「日本語：有、英語：無」として見積作成すれば同様の費用となる。<br><br>
              例）マイアブ機能が「web日英、アプリ英のみ」で運用の場合、<br>
              見積は「web日英、アプリ日のみ」で作成する。
             </p>
   </td>
   <td class="machine_box_lock"></td>
<!--
   <td class="lang_box_lock"></td> 
   <td class="lang_box_lock"></td>     
-->   
  </tr>
 </thead>
 <tbody>


                                
@foreach ($checkitems as $checkitem)
@if ($checkitem->id == 1)
 <tr style="height: 70px;">
@else
 <tr>
@endif     
 @if ($checkitem->id == 1) <!-- 運用期間入力フォーム -->
  <td style="vertical-align: middle";>
  <div>{{ $checkitem->checkitem }}期間：
   <input type="number" id="period" name="period" value="2" min="2" style="width: 50px";>ヶ月
   　1ドル：<input type="number" id="dollar" name="dollar" value="" style="width: 70px";>円
   　<!-- <input type="date" id="date1" name="date1" max="<?php echo date('Y-m-d'); ?>" style="width: 120px";>～<input type="date" id="date2" name="date2" max="<?php echo date('Y-m-d'); ?>" style="width: 120px";> -->
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
 @elseif ($checkitem->id == 53) <!-- ハイライトリンク件数 -->
  <td>
  <div>{{ $checkitem->checkitem }}
    件数：<input type="number" id="highlight" name="highlight" value="0" min="0" style="width: 50px";>件　※デフォルトの1件はカウントしない
  </div>
  </td> 
 @elseif ($checkitem->id == 56) <!-- セッションフィルター件数 -->
  <td>
  <div>{{ $checkitem->checkitem }}
   　<br>セッションフィルター 件数：<input type="number" id="sessfilter" name="sessfilter" value="0" min="0" style="width: 50px";>件<br>
   認証無しリンク指定 　件数：<input type="number" id="link" name="link" value="0" min="0" style="width: 50px";>件
  </div>
  </td>  
 @elseif ($checkitem->id == 15) <!-- デジポス -->
  <td>
  <div>{{ $checkitem->checkitem }}
    <select id="dpos" name="dpos">
        <option value="dpos-auth" selected>認証画面あり</option>
        <option value="dpos-no-auth">認証画面なし</option>
    </select>
  </div>
  </td>    
 @elseif ($checkitem->id == 16) <!-- LIVE/オンデマンド -->
  <td>
  <div>{{ $checkitem->checkitem }}
    <select id="live" name="live">
        <option value="live-auth" selected>認証画面あり</option>
        <option value="live-no-auth">認証画面なし</option>
    </select>
  </div>
  </td> 
 @elseif ($checkitem->id == 18) <!-- 認証付き外部リンク -->
  <td>
  <div>{{ $checkitem->checkitem }}
    <br>日ウェブ：<input type="number" id="external1" name="external1" value="0" min="0" style="width: 50px";>件
    <br>日アプリ：<input type="number" id="external2" name="external2" value="0" min="0" style="width: 50px";>件
    <br>英ウェブ：<input type="number" id="external3" name="external3" value="0" min="0" style="width: 50px";>件
    <br>英アプリ：<input type="number" id="external4" name="external4" value="0" min="0" style="width: 50px";>件
  </div>
  </td>    
 @else
  <td class="create_table">
  <div class="chkbox_lang">{{ $checkitem->checkitem }}
  </div>
  </td>  
 @endif 
  
 @if ($checkitem->id == 1) <!-- チェックボタン -->
 <!-- 日本語 -->
  <td class="checkposition create_table">
   <div class="chkbox_web">
   	<input type="checkbox" name="web[{{ $checkitem->id }}]" value="1" id="web-on-select" class="ja-select" onchange="change_web()"/>
   	<label for="web-on-select"></label>
   </div>
  </td>
 <td class="checkposition create_table" style="vertical-align: top;">
    <div class="chkbox_ja" style="margin-top: 5px;">
    	<input type="checkbox" name="ja[{{ $checkitem->id }}]" value="1" id="ja-on-select" onchange="change_ja()" disabled checked/>
    	<label for="ja-on-select"></label>   	
    </div>
 </td>
  <td class="checkposition create_table">
   <div class="chkbox_app">
   	<input type="checkbox" name="app[{{ $checkitem->id }}]" value="1" id="app-on-select" class="ja-select" onchange="change_app()"/>
   	<label for="app-on-select"></label>
   </div>
  </td>
 <!-- 日本語 -->
  <td class="checkposition create_table"></td>
 <!-- 英語 --> 
  <td class="checkposition create_table">
   <div class="chkbox_web">
   	<input type="checkbox" name="web_eng[{{ $checkitem->id }}]" value="1" id="web-on-select-eng" class="ja-select-eng" onchange="change_web_eng()" disabled/>
   	<label for="web-on-select-eng"></label>
   </div>
  </td>
 <td class="checkposition create_table" style="vertical-align: top;">
    <div class="chkbox_eng" style="margin-top: 5px;">
    	<input type="checkbox" name="eng[{{ $checkitem->id }}]" value="1" id="eng-on-select" onchange="change_eng()"/>
    	<label for="eng-on-select"></label>   	
    </div>
 </td>  
  <td class="checkposition create_table">
   <div class="chkbox_app">
   	<input type="checkbox" name="app_eng[{{ $checkitem->id }}]" value="1" id="app-on-select-eng" class="ja-select-eng" onchange="change_app_eng()"/>
   	<label for="app-on-select-eng"></label>
   </div>
  </td>
 <!-- 英語 -->
 
 <!-- 日本語 -->
 @else
  @if ($checkitem->machine == "common")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="common[{{ $checkitem->id }}]" value=1 class="common-select"></td>
  <td class="create_table"></td>
  @elseif ($checkitem->machine == "web")
   @if ($checkitem->id == 21) <!-- 各種ご案内調整 -->
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select2" disabled></td>
   <td class="create_table"></td>
   @else
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select" disabled></td>
   <td class="create_table"></td>
   @endif
  @elseif ($checkitem->machine == "app")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select" disabled></td>
  <td class="create_table"></td>
  @else
  <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select" disabled></td>
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select" disabled></td>
  @endif
 <!-- 日本語 -->
  <td class="checkposition create_table"></td>
 <!-- 英語 --> 
  @if ($checkitem->machine == "common")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="common_eng[{{ $checkitem->id }}]" value=1 class="common-select-eng" disabled checked></td>
  <td class="create_table"></td>
  @elseif ($checkitem->machine == "web")
   @if ($checkitem->id == 21) <!-- 各種ご案内調整 -->
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web_eng[{{ $checkitem->id }}]" value=1 class="web-select2-eng" disabled checked></td>
   <td class="create_table"></td>
   @else
   <td class="create_table"></td>
   <td class="checkposition create_table"><input type="checkbox" name="web_eng[{{ $checkitem->id }}]" value=1 class="web-select-eng" disabled checked></td>
   <td class="create_table"></td>
   @endif
  @elseif ($checkitem->machine == "app")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app_eng[{{ $checkitem->id }}]" value=1 class="app-select-eng" disabled checked></td>
  <td class="create_table"></td>
  @else
  <td class="checkposition create_table"><input type="checkbox" name="web_eng[{{ $checkitem->id }}]" value=1 class="web-select-eng" disabled checked></td>
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app_eng[{{ $checkitem->id }}]" value=1 class="app-select-eng" disabled checked></td>
  @endif  
 <!-- 英語 -->  
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
                <!-- 機能封印
                 <div>
                    <form action="{{ url('estimates_create_dpos') }}" method="POST" target="_blank" class="form-horizontal" onsubmit="return validateForm();">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">デジポス</button>
                    </form>
                 </div>    
                --> 
</div>
</body>
<!-- チェックボックス有効化・無効化判定 -->
<script>
function validateForm() {
    var dollarInput = document.getElementById("dollar");
    if (dollarInput.value.trim() === "") {
        var confirmed = confirm("1ドルの金額が入力されていません。本日の為替レートを参照して良いですか？");
        return confirmed; // 「OK」が選択された場合はフォームの送信を許可します
    }
    return true; // フォームの送信を許可します
}

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
        element = document.getElementsByClassName("common-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
    }else {
        element = document.getElementsByClassName("common-select");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
    }
}


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
function change_eng() {
    var element;
    if(document.getElementById("eng-on-select").checked) {
        element = document.querySelectorAll(".common-select-eng, .ja-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = false;
        });
    }else {
        element = document.querySelectorAll(".common-select-eng, .ja-select-eng");
        element = Array.from(element);
        element.forEach(function(element) {
        element.disabled = true;
        });
    }
}

</script>

@endsection