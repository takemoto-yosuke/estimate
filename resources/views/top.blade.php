 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
        @can('core')         
         <div class="card-title">
             <a href="{{ url('/estimates_make') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積作成</a>
         </div>      
         <div class="card-title">
             <a href="{{ url('/estimates_make_PartLang') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積作成（言語別）</a>
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
             <a href="{{ url('/data') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">データダウンロード・アップロード</a>
         </div>  
         <div class="card-title">
             <a href="{{ url('/manual') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">運用ルール</a>
         </div>  
        @endcan 
        
        @can('yamane') 
         <div class="card-title">
             <a href="{{ url('/registration/estimates_make') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積作成（参加登録）</a>
         </div><br>       
         <div class="card-title">
            <a href="{{ url('/registration/checkitem') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">チェック項目一覧（参加登録）</a>
         </div>         
         <div class="card-title">
            <a href="{{ url('/registration/estimate') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積項目一覧（参加登録）</a>
         </div>
         <div class="card-title">
             <a href="{{ url('/registration/data') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">データダウンロード・アップロード（参加登録）</a>
         </div>  
        @endcan 

<!--
         <div class="card-title">
             <a href="{{ url('/first_estimates_make') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">初期見積作成（マイスワン様用で検討）</a>
         </div>
-->
        
     </div>
 @endsection