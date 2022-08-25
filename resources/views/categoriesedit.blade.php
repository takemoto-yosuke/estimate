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
        <form action="{{ url('category/'.$category->id) }}" method="POST">
            @method('PATCH')
            <!-- item_name -->
            <div class="form-group">
                <label for="title">カテゴリー</label>
                <input type="text" name="category" class="form-control" value="{{$category->category}}">
            </div>
            <div class="form-group">
                <label for="title">ソートID</label>
                <input type="text" name="sort" class="form-control" value="{{$category->sort}}">
            </div>
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/category') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$category->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection