<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Category;
use App\Models\CheckItem;
use Validator;
use Auth;

class EstimatesController extends Controller
{
    
  public function __construct(){
//    $this->middleware('auth');
  }    
    
    public function index()
    {
      $estimates = Estimate::orderByRaw('category_id asc, created_at asc')->paginate(1000);
      $categories = Category::orderBy('created_at', 'asc')->paginate(100);
      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);
      return view('estimates', [
          'estimates' => $estimates,
          'categories' => $categories,
          'checkitems' => $checkitems
      ]);
    }

    public function create(Request $request)
    {
      $estimates = Estimate::orderByRaw('category_id asc, created_at asc')->paginate(1000);
      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);  
      $display = $request;
      
      return view('estimates_create', [
          'estimates' => $estimates,
          'checkitems' => $checkitems,
          'display' => $display
          
      ]); 
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
        //'item' => 'required|max:255',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquent モデル
         $estimates = new Estimate;
         $estimates->category_id = $request->category_id;
         $estimates->item = $request->item;
         $estimates->content = $request->content;
         $estimates->quantity = $request->quantity;
         $estimates->unit = $request->unit;
         $estimates->unit_prise = $request->unit_prise;
         $estimates->prise = $request->prise;
         
         if ($request->machine == "ウェブのみ"){
             $estimates->web_flag = 1;
             $estimates->app_flag = 0;             
         }
         else if ($request->machine == "アプリのみ"){
             $estimates->web_flag = 0;
             $estimates->app_flag = 1;
         }
         else if ($request->machine == "ウェブ含む"){
             $estimates->web_flag = 1;
             $estimates->app_flag = 2;
         }         
         else if ($request->machine == "アプリ含む"){
             $estimates->web_flag = 2;
             $estimates->app_flag = 1;
         }         
         else if ($request->machine == "ウェブ or アプリ"){
             $estimates->machine_both = 2;
         }         
         else if ($request->machine == "or（両端末有）"){
             $estimates->machine_both = 3;
         }         
         else if ($request->machine == "ウェブ and アプリ"){
             $estimates->machine_both = 1;
         }
         
         if ($request->lang == "日本語のみ"){
             $estimates->ja_flag = 1;
             $estimates->eng_flag = 0;
         }
         else if ($request->lang == "英語のみ"){
             $estimates->ja_flag = 0;
             $estimates->eng_flag = 1;             
         } 
         elseif ($request->lang == "日本語含む"){
             $estimates->ja_flag = 1;
             $estimates->eng_flag = 2;             
         }
         else if ($request->lang == "英語含む"){
             $estimates->ja_flag = 2;
             $estimates->eng_flag = 1;
         }          
         else if ($request->lang == "日本語 or 英語"){
             $estimates->lang_both = 2;
         }
         else if ($request->lang == "or（日英版有）"){
             $estimates->lang_both = 3;
         }         
         else if ($request->lang == "日本語 and 英語"){
             $estimates->lang_both = 1;
         }         
         $estimates->checkitem_id = $request->checkitem_id;
         $estimates->save(); 
         return redirect('estimate');
    }


/*
    public function check_item()
    {    
      $estimate_check_items = Estimate_check::orderBy('created_at', 'asc')->paginate(100);
      return view('estimate_check_item', [
          'estimate_check_item' => $estimate_check_items
      ]);    
    } 
    public function check_item_store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
        'check_item' => 'required|max:255',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquent モデル
         $estimate_check_items = new Estimate_check;
         $estimate_check_items->check_item = $request->check_item;
         $estimate_check_items->save(); 
         return redirect('/');
    }
*/    

    public function show()
    {
      $estimates = Estimate::orderByRaw('category_id asc, created_at asc')->paginate(100);
      $categories = Category::orderBy('created_at', 'asc')->paginate(100);
      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);
      return view('estimates_make', [
          'estimates' => $estimates,
          'categories' => $categories,
          'checkitems' => $checkitems
      ]);        
    }
    

    public function edit(Estimate $estimate)
    {
         return view('estimatesedit',compact('estimate'));
    }

    public function update(Request $request, $id)
    {
        $estimate = Estimate::find($id)->update($request->all());
        return redirect('/estimate'); 
    }

    public function destroy($id)
    {
        $estimate = Estimate::find($id)->delete();
        return redirect('/estimate');   
    }
}
