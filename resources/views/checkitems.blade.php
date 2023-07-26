<link href="css/estimate.css" rel="stylesheet" type="text/css">
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 本登録フォーム -->
        <form action="{{ url('checkitem') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="l_box"> 
             <!-- 本のタイトル -->
             <div class="form-group">
              項目
                 <div class="col-sm-11">
                     <input type="checkitem" name="checkitem" class="form-control">
                 </div>
             </div>
             <div class="machine_both_box">
              端末
                <div class="form-group">
                    <div class="col-sm-10">
                     <select type="machine" name="machine" class="form-control">
                     <option name="machine">web</option>
                     <option name="machine">app</option>
                     <option name="machine">common</option>
                     <option name="machine">both</option>                  
                     </select>                      
                    </div>
                </div>           
             </div>    
             <div class="machine_both_box">
              初期見積項目
                <div class="form-group">
                    <div class="col-sm-10">
                     <select type="first_estimate" name="first_estimate" class="form-control">
                     <option name="first_estimate"></option> 
                     <option name="first_estimate">1</option>             
                     </select>                      
                    </div>
                </div>           
             </div>  
            </div> 
             <!-- 本 登録ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-primary">
                         登録
                     </button>
                 </div>
             </div>
        </form>
    </div>
    <!-- Book: 既に登録されてる本のリスト -->
@if (count($checkitems) > 0)
    <div class="card-body">
        <div class="card-body">
            <!-- ドラッグアンドドロップで並び替え可能なテーブル -->
            <table id="sortable-table" class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>カテゴリー</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
@foreach ($checkitems as $checkitem)
    <tr data-id="{{ $checkitem->id }}">
        <!-- 本タイトル -->
        <td class="table-text">
            <div>{{ $checkitem->checkitem }}</div>
        </td>
        <!-- 本: 削除ボタン -->
        <td>
            <form action="{{ url('checkitem/'.$checkitem->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </td>
        <!-- 本: 更新ボタン -->
        <td>
            <form action="{{ url('checkitem/'.$checkitem->id.'/edit') }}" method="GET"> 
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </td>
    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- 並び順を保存するボタン -->
    <div class="card-body">
        <form action="{{ url('save-order') }}" method="POST" id="save-order-form">
            {{ csrf_field() }}
            @method('PUT')
            <input type="hidden" name="order" id="order-input">
            <button type="submit" class="btn btn-primary">並び順保存</button>
        </form>
    </div>
@endif          
</div>
<!-- Book: 既に登録されてる本のリスト -->
    
<!-- SortableJSのライブラリを読み込む -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<!-- テーブルのドラッグアンドドロップを有効化 -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sortableTable = new Sortable(document.getElementById('sortable-table').getElementsByTagName('tbody')[0], {
            animation: 150,
        });

        const saveOrderForm = document.getElementById('save-order-form');
        const orderInput = document.getElementById('order-input');

        // 保存ボタンがクリックされたら並び順をinputに設定してフォームを送信
        saveOrderForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const orderedIds = Array.from(document.querySelectorAll('#sortable-table tbody tr')).map(tr => tr.dataset.id);
            orderInput.value = JSON.stringify(orderedIds);
            saveOrderForm.submit();
        });
    });
</script>
@endsection
