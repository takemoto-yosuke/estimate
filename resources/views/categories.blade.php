 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             カテゴリー
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 本登録フォーム -->
         <form action="{{ url('category') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
             <div class="form-group">
                 <div class="col-sm-6">
                     <input type="category" name="category" class="form-control">
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
     @if (count($categories) > 0)
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
                         @foreach ($categories as $category)
                             <tr>
                                 <!-- 本タイトル -->
                                 <td class="table-text">
                                     <div>{{ $category->category }}</div>
                                 </td>
 			        <!-- 本: 削除ボタン -->
                                 <td> 			        
                                     <form action="{{ url('category/'.$category->id) }}" method="POST">
                                             {{ csrf_field() }}
                                             {{ method_field('DELETE') }}
                                             <button type="submit" class="btn btn-danger">
                                                 削除
                                             </button>
                                     </form> 			        
                                 </td>
                                <td>
                                	<form action="{{ url('category/'.$category->id.'/edit')  }}" method="GET"> {{ csrf_field() }}
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

<!-- jquery利用による並べ替え　～途中～ -->    
{{--<script src=”{{ mix(‘js/sort.js’) }}”></script>--}}
 @endsection