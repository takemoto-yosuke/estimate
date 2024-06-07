<link href="css/estimate.css" rel="stylesheet" type="text/css">
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    <!-- resources/views/common/errors.blade.php -->
     @if (count($errors) > 0)
         <!-- Form Error List -->
         <div class="alert alert-danger">
             <div><strong>入力した文字を修正してください。</strong></div> 
             <div>
                 <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
                 </ul>
             </div>
         </div>
     @endif
        <form action="{{ url('estimate/'.$estimate->id) }}" method="POST">
            @method('PATCH')
            <!-- item_name -->
            <div class="form-group">
                <label for="title">項目</label>
                <input type="text" name="item" class="form-control" value="{{$estimate->item}}">
            </div>
            <div class="form-group">
                <label for="title">内容</label>
                <input type="text" name="content" class="form-control" value="{{$estimate->content}}">
            </div>
            <div class="form-group">
                <label for="title">数量</label>
                <input type="text" name="quantity" class="form-control" value="{{$estimate->quantity}}">
            </div>
            <div class="form-group">
                <label for="title">単位</label>
                <input type="text" name="unit" class="form-control" value="{{$estimate->unit}}">
            </div>
            <div class="form-group">
                <label for="title">単価</label>
                <input type="text" name="unit_prise" class="form-control" value="{{$estimate->unit_prise}}">
            </div>
            <div class="form-group" style="display:none;">
                <label for="title">金額</label>
                <input type="text" name="prise" class="form-control" value=100>
            </div>

            <div class="form-group">
                <label for="title">端末</label>
                  <select type="lang" name="machine" class="form-control"> 
                      <option value={{ $estimate->machine }}>{{ $estimate->machine }}</option>
                      <option name="machine">web_only</option>
                      <option name="machine">web_include</option>               
                      <option name="machine">app_only</option>  
                      <option name="machine">app_include</option>
                      <option name="machine">web&app</option>               
                      <option name="machine">web|app</option>  
                  </select>                
            </div>
            <div class="form-group">
                <label for="title">言語</label>
                  <select type="lang" name="lang" class="form-control"> 
                      <option value={{ $estimate->lang }}>{{ $estimate->lang }}</option>
                      <option name="lang">ja|eng</option>
                      <option name="lang">ja&eng</option>               
                      <option name="lang">ja|&eng</option>
                      <option name="lang">ja&eng_web</option>
                      <option name="lang">ja&eng_app</option>
                      <option name="lang">ja|&eng_web</option>
                      <option name="lang">ja|&eng_app</option>
                  </select>   
            </div>              
            <div class="form-group">
                <label for="title">チェック項目</label>
               @php
               /* チェック項目取得 */
                $checkitem_name = $checkitems->where('id',$estimate->checkitem_id)->first();
               @endphp                
               @if ($checkitem_name != null)
                  <select type="checkitem_id" name="checkitem_id" class="form-control">
                  <option value={{ $estimate->checkitem_id }}>{{ $checkitem_name->checkitem }}</option>
                  @foreach ($checkitems as $checkitem) 
                  <option value={{ $checkitem->id }}>{{ $checkitem->checkitem }}</option>
                  @endforeach
                  </select>                  
               @else
                <input type="text" name="checkitem_id" class="form-control">
               @endif
            </div>
            
            
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/estimate') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$estimate->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection