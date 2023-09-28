<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
<body>
<div class="card-body"> 
<form action="{{ url('registration/estimates_create') }}" method="POST" target="_blank" class="form-horizontal" onsubmit="return validateForm();">
         {{ csrf_field() }}
<table class="table table-striped task-table" style="width: 850px;">
 <thead>
  <tr>
   <td class="item_box_lock">項目</td>
  </tr>
 </thead>
 <tbody>
                            
@foreach ($checkitems as $checkitem)     
 <tr>

  <td class="create_table"><label for="check[{{ $checkitem->id }}]">
  <div class="chkbox_lang">{{ $checkitem->checkitem }}
  </div></label>
  </td>  
  
  <td class="checkposition create_table"><input type="checkbox" name="check[{{ $checkitem->id }}]" value=1 id="check[{{ $checkitem->id }}]" checked="checked"></td>
 
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

@endsection