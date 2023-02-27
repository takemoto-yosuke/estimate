<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Category;
use App\Models\Estimate;
use App\Models\CheckItem;
use Illuminate\Http\Request;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EstimatesController;
use App\Http\Controllers\CheckItemController;

Auth::routes();

Route::get('/', function () {
     return view('top');
 })->middleware('auth');

//Route::get('/category', [CategoriesController::class, 'index']);
//Route::get('/checkitem', [CheckItemController::class, 'index']);
//Route::get('/estimate', [EstimatesController::class, 'index']);

Route::get('/estimates_make',[EstimatesController::class, 'show']);
Route::get('/first_estimates_make',[EstimatesController::class, 'show_first']);


//登録処理
//Route::post('/categories',[CategoriesController::class, 'store']);
//Route::post('/checkitems',[CheckItemController::class, 'store']);
//Route::post('/estimates',[EstimatesController::class, 'store']);
Route::post('/estimates_create',[EstimatesController::class, 'create']);
Route::post('/first_estimates_create',[EstimatesController::class, 'create_first']);
//作成ページ


//更新画面
//Route::get('/categoriesedit/{categories}',[CategoriesController::class, 'edit']);
//更新処理
//Route::post('/categories/update',[CategoriesController::class, 'update']);
//本を削除
//Route::delete('/category/{category}',[CategoriesController::class, 'destroy']);
//Route::delete('/checkitem/{checkitem}',[CheckItemController::class, 'destroy']);

Route::resource('checkitem', CheckItemController::class);
Route::resource('category', CategoriesController::class);
Route::resource('estimate', EstimatesController::class);

Route::get('/manual', function () {
     return view('manual');
 });