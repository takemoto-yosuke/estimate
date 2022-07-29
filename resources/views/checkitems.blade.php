<link href="css/estimate.css" rel="stylesheet" type="text/css">
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 本登録フォーム -->
         <form action="{{ url('checkitems') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
            <div class="l_box"> 
             <!-- 本のタイトル -->
             <div class="form-group">
              カテゴリーの追加
                 <div class="col-sm-11">
                     <input type="checkitem" name="checkitem" class="form-control">
                 </div>
             </div>
             <div class="machine_both_box">
              端末
                <div class="form-group">
                    <div class="col-sm-6">
                     <select type="machine" name="machine" class="form-control">
                     <option name="machine">web</option>
                     <option name="machine">app</option>
                     <option name="machine">common</option>
                     <option name="machine">both</option>                  
                     </select>                      
                    </div>
                </div>           
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
@if (count($checkitems) > 0)
         <div class="card-body">
             <div class="card-body">
                 <table class="table table-striped task-table">
                     <!-- テーブルヘッダ -->
                     <thead>
                         <th>カテゴリー</th>
                         <th>&nbsp;</th>
                     </thead>
                     <!-- テーブル本体 -->
                     <tbody>
                         @foreach ($checkitems as $checkitem)
                             <tr>
                                 <!-- 本タイトル -->
                                 <td class="table-text">
                                     <div>{{ $checkitem->checkitem }}</div>
                                 </td>
 			        <!-- 本: 削除ボタン -->
                                 <td> 			        
                                     <form action="{{ url('category/'.$checkitem->id) }}" method="POST">
                                             {{ csrf_field() }}
                                             {{ method_field('DELETE') }}
                                             <button type="submit" class="btn btn-danger">
                                                 削除
                                             </button>
                                     </form> 			        
                                 </td>
                                <td>
                                	<form action="{{ url('categoriesedit/'.$checkitem->id) }}" method="GET"> {{ csrf_field() }}
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