 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             <a href="{{ url('/estimates_make') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積作成</a>
         </div>
         <div class="card-title">
             <a href="{{ url('/first_estimates_make') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">初期見積作成</a>
         </div>         
         <div class="card-title">
            <a href="{{ url('/checkitem') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">チェック項目一覧（調整中）</a>
<!--            <a tabindex="-1" class="text-sm text-gray-700 dark:text-gray-500 underline">チェック項目一覧</a> -->
         </div>         
         <div class="card-title">
            <a href="{{ url('/estimate') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">見積項目一覧（調整中）</a>
<!--            <a tabindex="-1" class="text-sm text-gray-700 dark:text-gray-500 underline">見積項目一覧</a> -->
         </div>
         <div class="card-title">
             <a href="{{ url('/category') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">カテゴリー一覧（調整中）</a>
<!--             <a tabindex="-1" class="text-sm text-gray-700 dark:text-gray-500 underline">カテゴリー一覧</a> -->
         </div>         
     	    
     </div>
 @endsection