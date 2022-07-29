 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             本のタイトル
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 本登録フォーム -->
         <form action="{{ url('items') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
             <div class="form-group">
                 <div class="col-sm-6">
                     <input type="item" name="item_name" class="form-control">
                 </div>
             </div>
             <!-- 本 登録ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-primary">
                         Save
                     </button>
                 </div>
             </div>
         </form>
     @if (count($items) > 0)
         <div class="card-body">
             <div class="card-body">
                 <table class="table table-striped task-table">
                     <!-- テーブルヘッダ -->
                     <thead>
                         <th>本一覧</th>
                         <th>&nbsp;</th>
                     </thead>
                     <!-- テーブル本体 -->
                     <tbody>
                         @foreach ($items as $item)
                             <tr>
                                 <!-- 本タイトル -->
                                 <td class="table-text">
                                     <div>{{ $item->item_name }}</div>
                                 </td>
 			        <!-- 本: 削除ボタン -->
                                 <td> 			        
                                     <form action="{{ url('item/'.$item->id) }}" method="POST">
                                             {{ csrf_field() }}
                                             {{ method_field('DELETE') }}
                                             <button type="submit" class="btn btn-danger">
                                                 削除
                                             </button>
                                     </form> 			        
                                 </td>
                                <td>
                                	<form action="{{ url('itemsedit/'.$item->id) }}" method="GET"> {{ csrf_field() }}
                                	    <button type="submit" class="btn btn-primary">更新 </button>
                                	</form>
                                </td>                                 
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>		
    @endif         
     </div>
     <!-- Book: 既に登録されてる本のリスト -->
    
 @endsection