<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegiEstimate;
use App\Models\RegiCategory;
use App\Models\RegiCheckitem;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class RegiEstimateController extends Controller
{
    
  public function __construct(){
    $this->middleware('auth');
  }    
    
    public function index()
    {
      $estimates = RegiEstimate::orderByRaw('category_id asc, `order` asc')->paginate(1000);
      $categories = RegiCategory::orderBy('created_at', 'asc')->paginate(100);
      $checkitems = RegiCheckItem::orderBy('order', 'asc')->paginate(100);
      return view('registration/estimates', [
          'estimates' => $estimates,
          'categories' => $categories,
          'checkitems' => $checkitems
      ]);
    }

    public function create(Request $request)
    {
      $estimates = RegiEstimate::orderByRaw('category_id asc, `order` asc')->paginate(1000);
      $checkitems = RegiCheckitem::orderBy('order', 'asc')->paginate(100);  
      $display = $request;
      
      return view('registration/estimates_create', [
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
         $estimates = new RegiEstimate;
         $estimates->category_id = $request->category_id;
         $estimates->content = $request->content;
         $estimates->quantity = $request->quantity;
         $estimates->unit = $request->unit;
         $estimates->unit_prise = $request->unit_prise;
         $estimates->prise = $request->quantity * $request->unit_prise;
         if($estimates->prise == 0){$estimates->prise = null; }
         
         $estimates->checkitem_id = $request->checkitem_id;
         $estimates->save(); 
         return redirect('registration/estimate');
    }

    public function show()
    {
      $checkitems = RegiCheckitem::orderBy('order', 'asc')->paginate(100);
      return view('registration/estimates_make', [
          'checkitems' => $checkitems
      ]);        
    }

    public function edit(RegiEstimate $estimate)
    {
      $checkitems = RegiCheckitem::orderBy('order', 'asc')->paginate(100);      
         return view('registration/estimatesedit',[
             'estimate' => $estimate,
             'checkitems' => $checkitems
             ]);
    }

    public function update(Request $request, $id)
    {
        $estimate = RegiEstimate::find($id);
        $estimate->update($request->all());
        $estimate->prise = $request->quantity * $request->unit_prise;   //合計金額
        if($estimate->prise == 0){$estimate->prise = null; }
        $estimate->save();  //合計金額上書き
        return redirect('/registration/estimate'); 
    }

    public function destroy($id)
    {
        $estimate = RegiEstimate::find($id)->delete();
        return redirect('/registration/estimate');   
    }
    
    public function saveOrder(Request $request)
    {
        $order = json_decode($request->input('order'), true);

        DB::beginTransaction();

        try {
            foreach ($order as $index => $itemId) {
                RegiEstimate::where('id', $itemId)->update(['order' => $index + 1]);
            }

            DB::commit();
            return redirect()->back()->with('success', '並び順を保存しました。');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', '並び順の保存中にエラーが発生しました。');
        }
    }    
}
