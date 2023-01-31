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
        <form action="{{ url('checkitem/'.$checkitem->id) }}" method="POST">
            @method('PATCH')
            <!-- item_name -->
            <div class="form-group">
                <label for="title">項目</label>
                <input type="text" name="checkitem" class="form-control" value="{{$checkitem->checkitem}}">
            </div>
            <!-- item_name -->
            <div class="form-group">
                <label for="body">端末</label>
                     <select type="machine" name="machine" class="form-control" value="{{$checkitem->machine}}">
                     <option name="machine" selected>{{$checkitem->machine}}</option>
                     <option name="machine">web</option>
                     <option name="machine">app</option>
                     <option name="machine">common</option>
                     <option name="machine">both</option>                  
                     </select>                  
            </div>
            <!--/ item_name -->
            <div class="form-group">
                <label for="body">初期見積</label>
                     <select type="boolean" name="first_estimate" class="form-control" value="{{$checkitem->first_estimate}}">
                     <option name="first_estimate" selected>{{$checkitem->first_estimate}}</option>
                     <option name="first_estimate"></option>
                     <option name="first_estimate">1</option>               
                     </select>                  
            </div>
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/checkitem') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$checkitem->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection