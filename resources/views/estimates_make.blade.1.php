<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
<body>
<div class="card-body"> 
<form action="{{ url('estimates_create') }}" method="POST" target="_blank" class="form-horizontal">
         {{ csrf_field() }}
<table class="table table-striped task-table">
 <thead>
  <tr>
   <td class="item_box">項目</td>
   <td class="quantity_box">ウェブ</td>  
   <td class="quantity_box">アプリ</td>
   <td class="quantity_box">日本語</td> 
   <td class="quantity_box">英語</td>                     
  </tr>
 </thead>
 <tbody>
                                
@foreach ($checkitems as $checkitem)     
 <tr>


  <td>{{ $checkitem->checkitem }}</td>
 @if ($checkitem->id == 1)
  <td><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 id="web-on-select" onchange="change_web()"></td>
  <td><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 id="app-on-select" onchange="change_app()"></td>
  <td><input type="checkbox" name="ja[{{ $checkitem->id }}]" value=1 id="ja-on-select" onchange="change_ja()"></td>
  <td><input type="checkbox" name="eng[{{ $checkitem->id }}]" value=1 id="eng-on-select" onchange="change_eng()"></td>
 @else
  <td><input type="checkbox" name="web[{{ $checkitem->id }}]" value=1 class="web-select" disabled></td>
  <td><input type="checkbox" name="app[{{ $checkitem->id }}]" value=1 class="app-select" disabled></td>
  <td><input type="checkbox" name="ja[{{ $checkitem->id }}]" value=1 checked style="display:none" class="ja-select" disabled></td>
  <td><input type="checkbox" name="eng[{{ $checkitem->id }}]" value=1 checked style="display:none" class="eng-select" disabled></td>
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

