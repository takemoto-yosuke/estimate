<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Category;
use App\Models\CheckItem;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class EstimatesController extends Controller
{
    
  public function __construct(){
    $this->middleware('auth');
  }    
    
    public function index()
    {
      $estimates = Estimate::orderByRaw('category_id asc, `order` asc')->paginate(1000);
      $categories = Category::orderBy('created_at', 'asc')->paginate(100);
//      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);
      $checkitems = CheckItem::orderBy('order', 'asc')->paginate(100);
      return view('estimates', [
          'estimates' => $estimates,
          'categories' => $categories,
          'checkitems' => $checkitems
      ]);
    }

    public function create(Request $request)
    {
      $estimates = Estimate::orderByRaw('category_id asc, `order` asc')->paginate(1000);
//      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);  
      $checkitems = CheckItem::orderBy('order', 'asc')->paginate(100);  
      $display = $request;
      
      return view('estimates_create', [
          'estimates' => $estimates,
          'checkitems' => $checkitems,
          'display' => $display
          
      ]); 
    }
    
    public function create_first(Request $request)
    {
      $estimates = Estimate::orderByRaw('category_id asc, created_at asc')->paginate(1000);
//      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);  
      $checkitems = CheckItem::orderBy('id', 'asc')->paginate(100);  
      $display = $request;
      
      return view('first_estimates_create', [
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
//         $estimates->prise = $request->prise;
         $estimates->prise = $request->quantity * $request->unit_prise;
         if($estimates->prise == 0){$estimates->prise = null; }
         
         if ($request->machine == "ウェブのみ"){
             $estimates->machine = "web_only";            
         }
         else if ($request->machine == "アプリのみ"){
             $estimates->machine = "app_only"; 
         }
         else if ($request->machine == "ウェブ含む"){
             $estimates->machine = "web_include"; 
         }         
         else if ($request->machine == "アプリ含む"){
             $estimates->machine = "app_include"; 
         }         
         else if ($request->machine == "端末指定無し"){
             $estimates->machine = "web|app"; 
         }            
         else if ($request->machine == "ウェブ+アプリ"){
             $estimates->machine = "web&app"; 
         }   
         
         if ($request->lang == "言語指定無し"){
             $estimates->lang = "ja|eng";
         }    
         else if ($request->lang == "両言語"){
             $estimates->lang = "ja&eng";
         } 
         else if ($request->lang == "単言語"){
             $estimates->lang = "ja|&eng";
         }      
/*         
         if ($request->machine == "ウェブのみ"){
             $estimates->machine = "web_only";            
         }
         else if ($request->machine == "アプリのみ"){
             $estimates->machine = "app_only"; 
         }
         else if ($request->machine == "ウェブ含む"){
             $estimates->machine = "web_include"; 
         }         
         else if ($request->machine == "アプリ含む"){
             $estimates->machine = "app_include"; 
         }         
         else if ($request->machine == "ウェブ or アプリ"){
             $estimates->machine = "web|app"; 
         }            
         else if ($request->machine == "ウェブ and アプリ"){
             $estimates->machine = "web&app"; 
         }
         else if ($request->machine == "or（両端末有）"){
             $estimates->machine = "web|&app"; 
         } 
         
         if ($request->lang == "日本語のみ"){
             $estimates->lang = "ja_only";
         }
         else if ($request->lang == "英語のみ"){
             $estimates->lang = "eng_only";           
         } 
         elseif ($request->lang == "日本語含む"){
             $estimates->lang = "ja_include";           
         }
         else if ($request->lang == "英語含む"){
             $estimates->lang = "eng_include";
         }          
         else if ($request->lang == "日本語 or 英語"){
             $estimates->lang = "ja|eng";
         }    
         else if ($request->lang == "日本語 and 英語"){
             $estimates->lang = "ja&eng";
         } 
         else if ($request->lang == "or（日英版有）"){
             $estimates->lang = "ja|&eng";
         }      
*/         
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
//      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);
      $checkitems = CheckItem::orderBy('order', 'asc')->paginate(100);
      return view('estimates_make', [
          'estimates' => $estimates,
          'categories' => $categories,
          'checkitems' => $checkitems
      ]);        
    }
    
    public function show_first()
    {
      $estimates = Estimate::orderByRaw('category_id asc, created_at asc')->paginate(100);
      $categories = Category::orderBy('created_at', 'asc')->paginate(100);
//      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);
      $checkitems = CheckItem::where('first_estimate', 1)->paginate(100);
      return view('first_estimates_make', [
          'estimates' => $estimates,
          'categories' => $categories,
          'checkitems' => $checkitems
      ]);        
    }    

    public function edit(Estimate $estimate)
    {
      $checkitems = CheckItem::orderBy('order', 'asc')->paginate(100);        
//         return view('estimatesedit',compact('estimate'));
         return view('estimatesedit',[
             'estimate' => $estimate,
             'checkitems' => $checkitems
             ]);
    }

    public function update(Request $request, $id)
    {

//        $estimate = Estimate::find($id)->update($request->all());
        $estimate = Estimate::find($id);
        $estimate->update($request->all());
        $estimate->prise = $request->quantity * $request->unit_prise;   //合計金額
        if($estimate->prise == 0){$estimate->prise = null; }
        $estimate->save();  //合計金額上書き
        return redirect('/estimate'); 
    }

    public function destroy($id)
    {
        $estimate = Estimate::find($id)->delete();
        return redirect('/estimate');   
    }
    
    public function saveOrder(Request $request)
    {
        $order = json_decode($request->input('order'), true);

        DB::beginTransaction();

        try {
            foreach ($order as $index => $itemId) {
                Estimate::where('id', $itemId)->update(['order' => $index + 1]);
            }

            DB::commit();
            return redirect()->back()->with('success', '並び順を保存しました。');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', '並び順の保存中にエラーが発生しました。');
        }
    }    
}
