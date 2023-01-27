<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
<body>
<div class="card-body"> 
<form action="{{ url('first_estimates_create') }}" method="POST" target="_blank" class="form-horizontal">
         {{ csrf_field() }}
<table class="table table-striped task-table" style="width: 800px;">
 <thead>
  <tr>
   <td class="item_box_lock">項目</td>
   <td class="machine_box_lock"></td>  
   <td class="machine_box_lock"></td>  
   <td class="machine_box_lock"></td>
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
  <div>{{ $checkitem->checkitem }}
   　期間：<input type="number" id="period" name="period" value="2" min="2" style="width: 50px";>ヶ月 
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
 <td class="checkposition create_table">
    <div class="chkbox_ja">
    	<input type="checkbox" name="ja[{{ $checkitem->id }}]" value="1" id="ja-on-select" onchange="change_ja()"/>
    	<label for="ja-on-select"></label>   	
    </div>
 </td>
 <td class="checkposition create_table">
    <div class="chkbox_eng">
    	<input type="checkbox" name="eng[{{ $checkitem->id }}]" value="1" id="eng-on-select" onchange="change_eng()"/>
    	<label for="eng-on-select"></label>   	
    </div>
 </td>   

 @else
  @if ($checkitem->machine == "common")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="common[{{ $checkitem->id }}]" value=1></td>
  <td class="create_table"></td>
  @elseif ($checkitem->machine == "web")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select" disabled></td>
  <td class="create_table"></td>
  @elseif ($checkitem->machine == "app")
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select" disabled></td>
  <td class="create_table"></td>
  @else
  <td class="checkposition create_table"><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select" disabled></td>
  <td class="create_table"></td>
  <td class="checkposition create_table"><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select" disabled></td>
  @endif
  <td class="checkposition create_table"><input type="checkbox" name="ja[{{ $checkitem->id }}]" value=1 checked class="ja-select" disabled></td>
  <td class="checkposition create_table"><input type="checkbox" name="eng[{{ $checkitem->id }}]" value=1 checked class="eng-select" disabled></td>
 @endif  
 
 </tr>     
@endforeach
             <!-- 本 登録ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-11">
                     <button type="submit" class="btn btn-primary">
                         Save
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
    if(document.getElementById("web-on-select").checked) {
        element = document.getElementsByClassName("web-select");
        element = Array.from(element);
        element.forEach(function(element) {
         element.disabled = false;
        });
    }else {
        element = document.getElementsByClassName("web-select");
        element = Array.from(element);
        element.forEach(function(element) {
         element.disabled =true;
        });
    }
}
function change_app() {
    var element;
    if(document.getElementById("app-on-select").checked) {
        element = document.getElementsByClassName("app-select");
        element = Array.from(element);
        element.forEach(function(element) {
         element.disabled = false;
        });
    }else {
        element = document.getElementsByClassName("app-select");
        element = Array.from(element);
        element.forEach(function(element) {
         element.disabled =true;
        });
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
         element.disabled =true;
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
         element.disabled =true;
        });
    }
}
</script>
@endsection

