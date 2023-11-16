<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Category;
use App\Models\Estimate;
use App\Models\EstimatePartLang;
use App\Models\CheckItem;
use Illuminate\Http\Request;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EstimatesController;
use App\Http\Controllers\CheckItemController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UploadController;

use App\Models\RegiEstimate;
use App\Models\RegiCategory;
use App\Models\RegiCheckitem;
use App\Http\Controllers\RegiEstimateController;
use App\Http\Controllers\RegiCheckitemController;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\GenerateSqlDump;
Auth::routes();

Route::get('/', function () {
     return view('top');
 })->middleware('auth');

//Route::get('/category', [CategoriesController::class, 'index']);
//Route::get('/checkitem', [CheckItemController::class, 'index']);
//Route::get('/estimate', [EstimatesController::class, 'index']);

Route::get('/estimates_make',[EstimatesController::class, 'show']);
Route::get('/estimates_make_PartLang',[EstimatesController::class, 'show_PartLang']);
Route::get('/first_estimates_make',[EstimatesController::class, 'show_first']);


//登録処理
//Route::post('/categories',[CategoriesController::class, 'store']);
//Route::post('/checkitems',[CheckItemController::class, 'store']);
//Route::post('/estimates',[EstimatesController::class, 'store']);
Route::post('/estimates_create',[EstimatesController::class, 'create']);
Route::post('/estimates_create_PartLang',[EstimatesController::class, 'create_PartLang']);
Route::post('/estimates_create_dpos',[EstimatesController::class, 'create_dpos']);
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
Route::get('/data', function () {
     return view('data');
 });
 
Route::put('/save-order', [CheckItemController::class, 'saveOrder'])->name('save-order');
Route::put('/save-order-estimate', [EstimatesController::class, 'saveOrder'])->name('save-order');

//Route::get('/download-data', [DownloadController::class, 'downloadData'])->name('downloadData');
//Route::post('/upload-data', [UploadController::class, 'uploadData'])->name('uploadData');


//参加登録
Route::get('registration/estimates_make',[RegiEstimateController::class, 'show']);
Route::post('registration/estimates_create',[RegiEstimateController::class, 'create']);
Route::resource('registration/checkitem', RegiCheckitemController::class);
Route::resource('registration/category', RegiCategoriesController::class);
Route::resource('registration/estimate', RegiEstimateController::class);
Route::get('registration/manual', function () {
     return view('registration/manual');
 });
Route::get('registration/data', function () {
     return view('registration/data');
 }); 
 
Route::put('/registration/save-order', [RegiCheckitemController::class, 'saveOrder'])->name('registration/save-order');
Route::put('/registration/save-order-estimate', [RegiEstimateController::class, 'saveOrder'])->name('registration/save-order');

Route::get('/registration/download-data', [DownloadController::class, 'RegidownloadData'])->name('registration/downloadData');
Route::post('/registration/upload-data', [UploadController::class, 'RegiuploadData'])->name('registration/uploadData');


Route::get('/generate-and-download', [DownloadController::class, 'generateAndDownload'])->name('generate-and-download');
Route::post('/import-database', [DownloadController::class, 'importDatabase'])->name('import-database');
