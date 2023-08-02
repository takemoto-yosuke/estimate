 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
        @can('admin')         
         <div class="card-title">
             <a href="{{ url('/estimates_make') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積作成（コア用）</a>
         </div><br>       
         <div class="card-title">
            <a href="{{ url('/checkitem') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">チェック項目一覧</a>
         </div>         
         <div class="card-title">
            <a href="{{ url('/estimate') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積項目一覧</a>
         </div>
<!--
         <div class="card-title">
             <a href="{{ url('/category') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">カテゴリー一覧（調整中）</a>
         </div>  
-->         
         <div class="card-title">
             <a href="{{ url('/manual') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">運用ルール</a>
         </div>  
         <div class="card-title">
             <a href="{{ url('/data') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">データダウンロード・アップロード</a>
         </div>  
        @endcan 
<!--        
         <div class="card-title">
             <a href="{{ url('/first_estimates_make') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">初期見積作成（マイスワン様用で検討）</a>
         </div>         
-->     	    
     </div>
 @endsection